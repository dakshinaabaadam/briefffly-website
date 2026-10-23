      class Component extends DCLogic {
        state = { page: 'home', hover: -1, svc: 0, name:'', email:'', subject: 'Web Design', message:'', sent: false };
        mainRef = React.createRef(); previewRef = React.createRef(); curtainRef = React.createRef(); curtainLabelRef = React.createRef();
        labels = { home: 'Home', services: 'Services', work: 'Our Works', studio: 'Our Studio', contact: 'Contact Us', blog: 'Blog' };

        motion() {
          const m = this.props.motion ?? 'standard';
          return m === 'subtle' ? { d: 24, t: 700 } : m === 'expressive' ? { d: 72, t: 1200 } : { d: 44, t: 950 };
        }

        componentDidMount() {
          this.io = new IntersectionObserver(es => es.forEach(e => {
            if (!e.isIntersecting) return;
            const obs = e.target, el = obs.__rvChild || obs, { t } = this.motion(), delay = +(el.dataset.delay || 0);
            this.io.unobserve(obs);
            el.style.transition = `opacity ${t}ms cubic-bezier(.2,.7,.2,1) ${delay}ms, transform ${t}ms cubic-bezier(.2,.7,.2,1) ${delay}ms, clip-path ${t + 200}ms cubic-bezier(.7,0,.2,1) ${delay}ms`;
            el.style.opacity = '1'; el.style.transform = 'none';
            if (el.dataset.reveal === 'img') el.style.clipPath = 'inset(0 0 0 0)';
            this.io.unobserve(el);
          }), { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });
          this.scan();

          this.target = this.cur = window.scrollY; this.vel = 0; this.mx = innerWidth / 2; this.my = innerHeight / 2; this.px = this.mx; this.py = this.my;
          this.onWheel = e => {
            if (this.props.smoothScroll === false || e.ctrlKey) return;
            e.preventDefault();
            const max = document.documentElement.scrollHeight - innerHeight;
            this.target = Math.max(0, Math.min(max, this.target + e.deltaY));
            this.wheeling = true;
          };
          this.onScroll = () => { if (!this.wheeling) { this.target = this.cur = window.scrollY; } };
          this.onMove = e => { this.mx = e.clientX; this.my = e.clientY; };
          window.addEventListener('wheel', this.onWheel, { passive: false });
          window.addEventListener('scroll', this.onScroll, { passive: true });
          window.addEventListener('mousemove', this.onMove, { passive: true });
          this.mx0 = new WeakMap();
          const tick = () => {
            if (this.wheeling) {
              const prev = this.cur;
              this.cur += (this.target - this.cur) * 0.1;
              if (Math.abs(this.target - this.cur) < 0.5) { this.cur = this.target; this.wheeling = false; }
              window.scrollTo(0, this.cur);
              this.vel = this.cur - prev;
            } else this.vel *= 0.9;
            const vh = innerHeight;
            document.querySelectorAll('[data-parallax]').forEach(img => {
              const r = img.parentElement.getBoundingClientRect();
              if (r.bottom < -100 || r.top > vh + 100) return;
              const p = (r.top + r.height / 2 - vh / 2) / vh;
              img.style.transform = `translate3d(0,${(-p * (+img.dataset.parallax) * r.height).toFixed(1)}px,0)`;
            });
            const speed = this.props.marqueeSpeed ?? 1;
            document.querySelectorAll('[data-marquee]').forEach(tr => {
              let x = this.mx0.get(tr) || 0;
              const dir = +(tr.dataset.dir || 1);
              x -= dir * (+tr.dataset.speed) * speed * (0.6 + Math.min(Math.abs(this.vel) * 0.15, 3));
              const half = tr.scrollWidth / 2;
              if (half > 0) { if (x <= -half) x += half; if (x > 0) x -= half; }
              this.mx0.set(tr, x);
              tr.style.transform = `translate3d(${x.toFixed(1)}px,0,0)`;
            });
            if (this.previewRef.current) {
              this.px += (this.mx - this.px) * 0.12; this.py += (this.my - this.py) * 0.12;
              this.previewRef.current.style.transform = `translate3d(${this.px - 150}px,${this.py - 190}px,0)`;
            }
            this.raf = requestAnimationFrame(tick);
          };
          this.raf = requestAnimationFrame(tick);
        }

        componentDidUpdate(_, prev) { if (prev && prev.page !== this.state.page) this.scan(); }

        componentWillUnmount() {
          cancelAnimationFrame(this.raf); this.io && this.io.disconnect();
          window.removeEventListener('wheel', this.onWheel); window.removeEventListener('scroll', this.onScroll); window.removeEventListener('mousemove', this.onMove);
        }

        scan() {
          const { d } = this.motion();
          document.querySelectorAll('[data-reveal]:not([data-rv])').forEach(el => {
            el.setAttribute('data-rv', '1');
            const k = el.dataset.reveal;
            el.style.transition = 'none';
            if (k === 'line') {
              el.style.transform = 'translate3d(0,110%,0)';
              const p = el.parentElement; p.__rvChild = el; this.io.observe(p); return;
            }
            if (k === 'img') el.style.clipPath = 'inset(12% 6% 12% 6% round 8px)';
            else { el.style.opacity = '0'; el.style.transform = `translate3d(0,${d}px,0)`; }
            this.io.observe(el);
          });
        }

        go(page) {
          return e => {
            e && e.preventDefault && e.preventDefault();
            if (this.busy) return;
            const c = this.curtainRef.current;
            if (!c || page === this.state.page) { if (page === this.state.page) this.scrollTop(); return; }
            this.busy = true;
            this.curtainLabelRef.current.textContent = this.labels[page];
            c.style.transition = 'transform 600ms cubic-bezier(.7,0,.2,1)';
            c.style.transform = 'translateY(0)';
            setTimeout(() => {
              this.setState({ page, hover: -1, sent: false });
              this.scrollTop(true);
              requestAnimationFrame(() => requestAnimationFrame(() => this.scan()));
              setTimeout(() => {
                this.scan();
                c.style.transform = 'translateY(-100%)';
                setTimeout(() => { c.style.transition = 'none'; c.style.transform = 'translateY(100%)'; this.busy = false; }, 650);
              }, 180);
            }, 620);
          };
        }

        scrollTop(instant) {
          if (instant) { window.scrollTo(0, 0); this.target = this.cur = 0; this.wheeling = false; }
          else { this.target = 0; this.wheeling = true; }
        }

        renderVals() {
          const { page, hover, svc } = this.state;
          const img = p => 'https://briefffly.studio/assets/' + p;
          const projectsRaw = [
            ['Fashion App', ['Mobile App', 'UI/UX', 'E-Commerce', 'Lifestyle'], 'videos/01.jpg'],
            ['Co-Working Space Booking System', ['Mobile App', 'Website', 'Branding', 'SaaS', 'Booking Platform'], 'videos/02.jpg'],
            ['Mental Health Platform', ['Mobile App', 'Website', 'Branding', 'Therapy Booking', 'HealthTech'], 'videos/03.jpg'],
            ['Finance Management Platform', ['Web App', 'Mobile App', 'Expense Tracking', 'Enterprise Solution'], 'videos/04.jpg']
          ];
          const projects = projectsRaw.map(([title, tags, src], i) => ({
            num: String(i + 1).padStart(2, '0'), title, tags, tagline: tags.join(' · '), img: img(src),
            onEnter: () => this.setState({ hover: i }),
            shift: hover === i ? '16px' : '0px', titleColor: hover === -1 || hover === i ? 'var(--ink)' : 'var(--ink-45)',
            arrowRot: hover === i ? '-45deg' : '0deg', previewOpacity: hover === i ? 1 : 0,
            offset: i % 2 === 1 ? 'clamp(0px,8vw,120px)' : '0px'
          }));
          const svcRaw = [
            ['Web Design', 'Web Design & Development', 'Web-Design.png', 'Web-Development.png',
              'We create visually compelling, scalable, and conversion-focused websites that blend aesthetics with functionality. From responsive sites to custom eCommerce solutions, we craft user-focused experiences that grow with your brand.',
              ['Mobile-friendly, visually stunning designs', 'Smooth interactions, animations, and transitions', 'Optimized for SEO, speed, and engagement'],
              [['Websites', 'Custom, responsive designs for seamless UI/UX and strong brand presence'], ['Landing Pages', 'Conversion-optimized for launches, lead generation, and campaigns'], ['E-commerce', 'Secure, scalable online stores for smooth shopping experiences'], ['Platforms', 'SaaS tools, dashboards, learning systems, and more']]],
            ['Branding', 'Branding', 'Branding.png', 'Branding.png',
              'We design purposeful brand identities that position your business with clarity, confidence, and lasting impact. From strategy to visual systems, we craft brands that are iconic, memorable, and built to grow.',
              ['Brand strategy & positioning', 'Complete visual identity systems', 'Timeless, scalable, standout branding'],
              [['Logo Design', 'Professional, scalable logos that capture your brand’s essence'], ['Marketing Collateral', 'Brochures, packaging, stationery & digital assets for consistent communication'], ['Illustrations', 'Custom artwork to enrich brand storytelling'], ['Presentations', 'Investor decks & pitches designed for maximum impact']]],
            ['Social Creatives', 'Social Creatives', 'Social-Creatives.png', 'Social-Creatives.png',
              'We craft scroll-stopping social media designs that amplify your brand presence and drive engagement. From campaign concepts to daily content, we ensure every creative is on-brand, impactful, and ready to perform.',
              ['Platform-optimized designs for all social channels', 'Consistent branding across campaigns', 'Creative assets that boost visibility & interaction'],
              [['Campaign Creatives', 'Eye-catching visuals for launches, events, and promotions'], ['Content Templates', 'Editable, reusable designs for faster content creation'], ['Ad Creatives', 'Conversion-driven visuals for paid campaigns'], ['Motion Graphics', 'Animated elements to enhance storytelling and engagement']]],
            ['Mobile App Design', 'Mobile App Design', 'Mobile-App-Design.png', 'Mobile-App-Development.png',
              'We design mobile applications that are intuitive, engaging, and visually compelling. From concept to clickable prototypes, our process ensures seamless user experiences and stunning interfaces that keep users coming back.',
              ['User-focused, high-impact app designs', 'Interactive prototypes & smooth animations', 'Optimized for usability, retention & performance'],
              [['UI/UX Design', 'Clean, functional, and user-friendly app interfaces for iOS & Android'], ['Prototyping', 'Interactive wireframes & clickable demos to test before development'], ['Visual Design Systems', 'Scalable, consistent styles for long-term product growth'], ['App Redesign', 'Modernizing existing apps for improved performance and user satisfaction']]],
            ['3D Animation', '3D Animation', '3D-Animation.png', '3D-Animation.png',
              'We create immersive 3D animations that bring ideas to life with stunning realism and storytelling impact. From product visualizations to explainer videos, our animations captivate audiences and elevate brand experiences.',
              ['High-quality, photorealistic 3D visuals', 'Story-driven animations for maximum engagement', 'Optimized for marketing, presentations & digital platforms'],
              [['Product Animation', 'Detailed 3D renders showcasing features & functionality'], ['Explainer Videos', 'Clear, engaging animations for concepts & processes'], ['Architectural Visualization', 'Realistic 3D walkthroughs and flyovers'], ['Motion Graphics', '3D elements blended with dynamic graphic design']]]
          ];
          const services = svcRaw.map(([name, title, homeImg, pageImg, desc, bullets, subs], i) => ({
            num: String(i + 1).padStart(2, '0'), name, title, desc, bullets,
            subs: subs.map(([t, d]) => ({ t, d })),
            img: img('images/homepage/' + homeImg), pageImg: img('images/services-page/' + pageImg),
            onEnter: () => this.setState({ svc: i }),
            color: svc === i ? 'var(--ink)' : 'var(--ink-45)', arrowOpacity: svc === i ? 1 : 0, arrowShift: svc === i ? '0px' : '-12px',
            imgOpacity: svc === i ? 1 : 0, imgScale: svc === i ? 1 : 1.08, order: i % 2 ? 2 : 0
          }));
          const navDefs = [['services', 'Services'], ['work', 'Our Works'], ['studio', 'Our Studio'], ['contact', 'Contact Us'], ['blog', 'Blog']];
          const navItems = navDefs.map(([k, label]) => ({ label, onClick: this.go(k), color: page === k ? 'var(--accent-hover)' : 'var(--ink)' }));
          const posts = [
            ['August 23, 2025', 'Top Designing Agency to Elevate Your Business in 2025', 'In today\'s fast-paced digital world, design has become more than just a way to make things seem good.', 'top-designing-agency-to-elevate-your-business-in-2025.png'],
            ['August 25, 2025', 'Best AI Tools Every Designer Should Try in 2025', 'The design world is changing faster than ever, and 2025 is proving to be a turning point.', 'best-ai-tools-every-designer-should-try-in-2025.png'],
            ['August 31, 2025', 'The Ultimate Guide to Design: Pro Tips, Tricks & Best Practices', 'Design is more than just making something look appealing-- it is about resolving problems, enhancing functionality, and producing meaningful experiences.', 'the-ultimate-guide-to-design-pro-tips-tricks-best-practices.png']
          ].map(([date, title, excerpt, f], i) => ({ date, title, excerpt, img: img('images/blog/' + f), delay: i * 100 }));
          const a1 = img('images/testimonials/author1.jpg'), a2 = img('images/testimonials/author2.jpg');
          const testimonials = [
            ['Briefffly Design Studio transformed our vision into a stunning reality. Truly impressive work!', 'Alex R.', 'Brand Owner', a1],
            ['Professional, creative, and always on time. They made the entire process stress-free.', 'Priya S.', 'Startup Founder', a2],
            ['Their attention to detail and innovative approach set them apart from the rest.', 'David M.', 'Marketing Head', a1],
            ['We saw a real boost in engagement after our new design went live. Highly recommended!', 'Riya P.', 'Business Owner', a2]
          ].map(([quote, name, role, im], i) => ({ quote, name, role, img: im, delay: (i % 2) * 120 }));
          const process = [
            ['Discovery & Strategy', 'We begin by understanding your brand, goals, and audience to create a clear roadmap.', 'Discovery-Strategy.png'],
            ['Design and Prototyping', 'Our team crafts engaging visuals and prototypes to bring your ideas to life.', 'Design-Prototyping.png'],
            ['Development and Testing', 'We build your project with precision and test it for smooth, reliable performance.', 'Development-Testing.png'],
            ['Launch and Support', 'We launch your project and provide ongoing updates to keep it performing at its best.', 'Launch-Support.png']
          ].map(([title, text, f], i) => ({ num: String(i + 1).padStart(2, '0'), title, text, img: img('images/homepage/' + f), delay: i * 100 }));
          const studioSteps = [
            ['Ideation', 'We dive deep into understanding your brand, audience, and goals, exploring fresh strategies and innovative concepts that set the foundation for success.'],
            ['Creation', 'We bring ideas to life with thoughtful design and precise execution, blending creativity with functionality to deliver solutions that resonate and perform.'],
            ['Scale Up', 'We optimize, refine, and expand your digital presence, ensuring your brand grows stronger, reaches wider audiences, and stays ahead of the competition.']
          ].map(([title, text], i) => ({ num: String(i + 1).padStart(2, '0'), title, text, delay: i * 120 }));
          const howWeWork = [
            ['Problem', 'We start by understanding the challenge at its core — defining what needs to be solved and why it matters.'],
            ['Research (Needs & Goals)', 'In-depth strategy and insights through user research, market analysis, and interviews to set a strong foundation.'],
            ['Interaction (Patterns & Systems)', 'Designing intuitive structures and flows with wireframes, prototypes, and interaction patterns that enhance usability.'],
            ['Design (Aesthetics & Emotions)', 'Crafting visually compelling experiences through moodboards, color theory, typography, and storytelling.'],
            ['Solution', 'Delivering a refined, tested, and scalable product that meets goals, delights users, and drives results.']
          ].map(([title, text], i) => ({ num: String(i + 1).padStart(2, '0'), title, text }));
          const team = [['Aarav Patel', 'Co-Founder & CEO'], ['Ethan Walker', 'Co-Founder & Creative Director'], ['Ananya Sharma', 'Content Writer'], ['Neha Verma', 'UI/UX Designer'], ['Michael Johnson', 'UI/UX Designer'], ['Karan Joshi', 'Motion Graphic Designer'], ['Olivia Martinez', '3D Designer'], ['Riya Kapoor', 'Marketing Executive']].map(([name, role]) => ({ name, role }));
          const packages = [
            { name: 'Startup Pack', sub: 'Perfect for new brands & small businesses', bg: 'var(--paper)', fg: 'var(--ink)', rule: 'var(--border-default)', delay: 0,
              includes: ['Logo Design & Basic Brand Identity', 'One-Page Website or Landing Page', '5 Social Media Creatives (Static)', 'Basic SEO Optimization', '1 Round of Revisions per deliverable'],
              extras: ['Affordable', 'Fast delivery timelines', 'Ideal for MVPs & product launches'] },
            { name: 'Enterprise Pack', sub: 'Built for established brands & growth-focused businesses.', bg: 'var(--ink)', fg: 'var(--paper)', rule: 'var(--ink-70)', delay: 120,
              includes: ['Full Brand Identity & Guidelines', 'Multi-Page Website or eCommerce Store', '15 Social Media Creatives (Static + Motion)', 'Mobile App UI/UX Design (Up to X screens)', 'Advanced SEO Optimization', '3D Product Animation (Short Clip)', 'Multiple Revision Rounds'],
              extras: ['Priority project scheduling', 'Dedicated account manager', 'Scalable design solutions across platforms'] }
          ];
          const mA = ['Web Design Agency', 'Development', 'Web Design', 'Mobile Apps Design'];
          const mS = ['Brand Identity Design Services', 'Web & Mobile UI/UX Design', 'Social & Digital Creatives', 'Visual Systems & Guidelines', 'Pitch Deck Design Services', 'Creative Consultant Services'];
          return {
            mainRef: this.mainRef, previewRef: this.previewRef, curtainRef: this.curtainRef, curtainLabelRef: this.curtainLabelRef,
            isHome: page === 'home', isWork: page === 'work', isServices: page === 'services', isStudio: page === 'studio', isBlog: page === 'blog', isContact: page === 'contact',
            goHome: this.go('home'), goWork: this.go('work'), goServices: this.go('services'), goStudio: this.go('studio'), goContact: this.go('contact'), goBlog: this.go('blog'),
            navItems, projects, services, posts, testimonials, process, studioSteps, howWeWork, team, packages,
            disciplines: ['Web Design', 'Branding', 'Mobile App Design', 'Social Creatives', '3D Animation'],
            specialty: ['Global brand collaborations', 'Expert, trained design consultants', 'Proven brand identity & UI/UX success', 'Scalable solutions across industries'],
            marqueeA: [...mA, ...mA, ...mA, ...mA], marqueeServices: [...mS, ...mS], marqueeB: Array(8).fill('Get In Touch'),
            clearHover: () => this.setState({ hover: -1 }),
            previewOpacity: page === 'home' && hover >= 0 ? 1 : 0, previewScale: hover >= 0 ? 1 : 0.85,

            subjects: ['Web Design', 'SEO Services', 'Development', 'Branding', 'Other'], 
            
            name: this.state.name,
            email: this.state.email,
            subject: this.state.subject,
            message: this.state.message,

            onName: e => this.setState({ name: e.target.value }),
            onEmail: e => this.setState({ email: e.target.value }),
            onSubject: e => this.setState({ subject: e.target.value }),
            onMessage: e => this.setState({ message: e.target.value }),

            formSent: this.state.sent, 
            formOpen: !this.state.sent, 
            <!-- sendForm: async () => {
              const response = await fetch('http://127.0.0.1:8000/contact', {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                  name: this.state.name,
                  email: this.state.email,
                  subject: this.state.subject,
                  message: this.state.message
                })
              });

              const data = await response.json();

              if(data.success){
                this.setState({ sent: true });
              }
            } -->

            sendForm: async () => {
              const apiBase = window.location.port === '5500'
                ? 'http://127.0.0.1:8000'
                : window.location.origin;

              try {
                const response = await fetch(apiBase + "/send-email", {
                  method: "POST",
                  headers: {
                    "Content-Type": "application/json"
                  },
                  body: JSON.stringify({
                    name: this.state.name,
                    email: this.state.email,
                    subject: this.state.subject,
                    message: this.state.message
                  })
                });

                const result = await response.json();

                console.log("Contact email response:", result);
                console.log("First email request completed");

                if (!response.ok || !result.success) {
                  console.error("Contact email failed:", result);
                  return;
                }

                const autoReplyResponse = await fetch(apiBase + "/send-auto-reply", {
                  method: "POST",
                  headers: {
                    "Content-Type": "application/json"
                  },
                  body: JSON.stringify({
                    name: this.state.name,
                    email: this.state.email,
                    subject: this.state.subject,
                    message: this.state.message
                  })
                });

                const autoReplyResult = await autoReplyResponse.json();

                console.log("Auto-reply response:", autoReplyResult);
                console.log("Second email request completed");

                if (result.success && autoReplyResult.success) {
                  this.setState({ sent: true });
                }
              } catch (error) {
                console.error("Contact form submission failed:", error);
              }
            }
          };
        }
      }
