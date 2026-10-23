      class Component extends DCLogic {
        state = { page: 'home', svc: 0, proc: 0, t: 0, menu: false, scrolled: false, name:'', email:'', message:'',subject: 'Web Design', sent: false };
        curtainA = React.createRef(); curtainB = React.createRef(); curtainLabel = React.createRef();
        labels = { home: 'Home', services: 'Services', work: 'Our Works', studio: 'Our Studio', contact: 'Contact Us', blog: 'Blog' };

        motion() {
          const m = this.props.motion ?? 'standard';
          return m === 'subtle' ? { d: 28, t: 700 } : m === 'expressive' ? { d: 90, t: 1250 } : { d: 56, t: 1000 };
        }

        componentDidMount() {
          this.io = new IntersectionObserver(es => es.forEach(e => {
            if (!e.isIntersecting) return;
            const obs = e.target, el = obs.__rvChild || obs, { t } = this.motion(), delay = +(el.dataset.delay || 0);
            this.io.unobserve(obs);
            el.style.transition = `opacity ${t}ms cubic-bezier(.2,.7,.2,1) ${delay}ms, transform ${t}ms cubic-bezier(.16,1,.3,1) ${delay}ms, clip-path ${t + 200}ms cubic-bezier(.7,0,.2,1) ${delay}ms`;
            el.style.opacity = '1'; el.style.transform = 'none';
            if (el.dataset.reveal === 'img') el.style.clipPath = 'inset(0 0 0 0 round 0px)';
          }), { threshold: 0.1, rootMargin: '0px 0px -5% 0px' });
          this.vio = new IntersectionObserver(es => es.forEach(e => { const v = e.target; if (e.isIntersecting) { const p = v.play(); p && p.catch && p.catch(() => {}); } else v.pause(); }), { threshold: 0.35 });
          this.scan();

          this.target = this.cur = window.scrollY; this.vel = 0; this.mx = -999; this.my = -999;
          this.mq = new WeakMap();
          this.onWheel = e => {
            if (this.props.smoothScroll === false || e.ctrlKey || this.state.menu) return;
            e.preventDefault();
            const max = document.documentElement.scrollHeight - innerHeight;
            this.target = Math.max(0, Math.min(max, this.target + e.deltaY));
            this.wheeling = true;
          };
          this.onScroll = () => {
            if (!this.wheeling) this.target = this.cur = window.scrollY;
            const s = window.scrollY > 40;
            if (s !== this.state.scrolled) this.setState({ scrolled: s });
          };
          this.onMove = e => { this.mx = e.clientX; this.my = e.clientY; };
          window.addEventListener('wheel', this.onWheel, { passive: false });
          window.addEventListener('scroll', this.onScroll, { passive: true });
          window.addEventListener('mousemove', this.onMove, { passive: true });

          const tick = () => {
            if (this.wheeling) {
              const prev = this.cur;
              this.cur += (this.target - this.cur) * 0.1;
              if (Math.abs(this.target - this.cur) < 0.5) { this.cur = this.target; this.wheeling = false; }
              window.scrollTo(0, this.cur); this.vel = this.cur - prev;
            } else this.vel *= 0.9;
            const vh = innerHeight, vw = innerWidth;
            document.querySelectorAll('[data-parallax]').forEach(img => {
              const r = img.parentElement.getBoundingClientRect();
              if (r.bottom < -100 || r.top > vh + 100) return;
              const p = (r.top + r.height / 2 - vh / 2) / vh;
              img.style.transform = `translate3d(0,${(-p * (+img.dataset.parallax) * r.height).toFixed(1)}px,0)`;
            });
            const speed = this.props.marqueeSpeed ?? 1;
            document.querySelectorAll('[data-marquee]').forEach(tr => {
              let x = this.mq.get(tr) || 0;
              const dir = +(tr.dataset.dir || 1);
              x -= dir * (+tr.dataset.speed) * speed * (0.7 + Math.min(Math.abs(this.vel) * 0.18, 4));
              const half = tr.scrollWidth / 2;
              if (half > 0) { if (x <= -half) x += half; if (x > 0) x -= half; }
              this.mq.set(tr, x); tr.style.transform = `translate3d(${x.toFixed(1)}px,0,0)`;
            });
            document.querySelectorAll('[data-hscroll]').forEach(sec => {
              const track = sec.querySelector('[data-htrack]'), bar = sec.querySelector('[data-hbar]');
              if (!track) return;
              const dist = Math.max(0, track.scrollWidth - vw);
              const h = vh + dist; if (sec.__h !== h) { sec.style.height = h + 'px'; sec.__h = h; }
              const r = sec.getBoundingClientRect();
              const p = dist ? Math.min(1, Math.max(0, -r.top / dist)) : 0;
              track.style.transform = `translate3d(${(-p * dist).toFixed(1)}px,0,0)`;
              if (bar) bar.style.transform = `scaleX(${p})`;
            });
            document.querySelectorAll('[data-words]').forEach(el => {
              const r = el.getBoundingClientRect();
              const p = Math.min(1, Math.max(0, (vh * 0.85 - r.top) / (r.height + vh * 0.35)));
              const ws = el.children, n = ws.length, lit = p * n;
              for (let i = 0; i < n; i++) ws[i].style.opacity = i < lit ? '1' : '0.16';
            });
            document.querySelectorAll('[data-fill]').forEach(el => {
              const r = el.closest('[data-fillwrap]').getBoundingClientRect();
              const p = Math.min(1, Math.max(0, (vh * 0.8 - r.top) / (r.height * 0.9)));
              el.style.transform = `scaleX(${p.toFixed(3)})`;
            });
            document.querySelectorAll('[data-svcsec]').forEach(sec => {
              const r = sec.getBoundingClientRect();
              if (r.bottom < 0 || r.top > vh) return;
              const p = (vh - r.top) / (vh + r.height) - 0.5;
              sec.querySelectorAll('[data-srow]').forEach((row, i) => { row.style.transform = 'translate3d(' + (p * +row.dataset.dir * 160 * (1 + i * 0.12)).toFixed(1) + 'px,0,0)'; });
            });
            const pill = document.querySelector('[data-wpill]');
            if (pill) {
              let found = null;
              document.querySelectorAll('[data-wspread]').forEach(sp => {
                const r = sp.getBoundingClientRect();
                if (r.top < vh * 0.55 && r.bottom > vh * 0.45) found = sp;
                if (r.bottom < -50 || r.top > vh + 50) return;
                const k = (r.top + r.height / 2 - vh / 2) / vh;
                const bl = sp.querySelector('[data-wblock]');
                if (bl) { const d = +bl.dataset.dir; bl.style.transform = 'translate3d(' + (d * (18 - k * 40)).toFixed(1) + 'px,' + (18 + k * 30).toFixed(1) + 'px,0) rotate(' + (d * (2.5 - k * 4)).toFixed(2) + 'deg)'; }
              });
              pill.style.opacity = found ? '1' : '0';
              if (found && pill.__cur !== found) {
                pill.__cur = found;
                pill.querySelector('[data-wpnum]').textContent = found.dataset.num;
                pill.querySelector('[data-wpname]').textContent = found.dataset.name;
              }
            }
            const wc = document.querySelector('[data-wcur]');
            if (wc) {
              this.wx = this.wx ?? this.mx; this.wy = this.wy ?? this.my;
              const ox = this.wx; this.wx += (this.mx - this.wx) * 0.16; this.wy += (this.my - this.wy) * 0.16;
              const rot = Math.max(-12, Math.min(12, (this.wx - ox) * 0.5));
              wc.style.transform = 'translate3d(' + this.wx.toFixed(1) + 'px,' + this.wy.toFixed(1) + 'px,0) rotate(' + rot.toFixed(2) + 'deg)';
            }
            const fl = document.querySelector('[data-sfloat]');
            if (fl) {
              this.fx = this.fx ?? this.mx; this.fy = this.fy ?? this.my;
              const ox = this.fx; this.fx += (this.mx - this.fx) * 0.13; this.fy += (this.my - this.fy) * 0.13;
              const rot = Math.max(-14, Math.min(14, (this.fx - ox) * 0.6));
              fl.style.transform = 'translate3d(' + (this.fx - fl.offsetWidth / 2).toFixed(1) + 'px,' + (this.fy - fl.offsetHeight / 2).toFixed(1) + 'px,0) rotate(' + rot.toFixed(2) + 'deg)';
            }
            document.querySelectorAll('[data-stack]').forEach(sec => {
              const r = sec.getBoundingClientRect();
              if (r.bottom < 0 || r.top > vh) return;
              const cards = sec.querySelectorAll('[data-scard]'), n = cards.length; if (!n) return;
              const p = Math.min(1, Math.max(0, -r.top / Math.max(1, r.height - vh)));
              const f = p * (n - 1) * 1.08;
              const ez = x => x < 0.5 ? 4 * x * x * x : 1 - Math.pow(-2 * x + 2, 3) / 2;
              const big = sec.querySelector('[data-sbig]'); if (big) big.style.transform = 'translate3d(' + (-p * 40).toFixed(2) + '%,0,0)';
              const cur = Math.min(n - 1, Math.round(f));
              const cnt = sec.querySelector('[data-scount]'); if (cnt) cnt.textContent = String(cur + 1).padStart(2, '0');
              sec.querySelectorAll('[data-sdot]').forEach((d, i) => { d.style.background = i === cur ? '#ff4d1f' : '#4a463f'; d.style.width = i === cur ? '40px' : '22px'; });
              cards.forEach((c, i) => {
                const t = i === 0 ? 1 : ez(Math.min(1, Math.max(0, f - (i - 1))));
                const d = Math.min(3, Math.max(0, f - i));
                const y = (1 - t) * 115 - d * 2.2;
                c.style.transform = 'translate3d(0,' + y.toFixed(2) + '%,0) scale(' + (1 - d * 0.06).toFixed(4) + ') rotate(' + ((1 - t) * 5).toFixed(2) + 'deg)';
                const sh = c.querySelector('[data-sshade]'); if (sh) sh.style.opacity = (Math.min(1, d) * 0.55).toFixed(3);
                const im = c.querySelector('[data-simg]'); if (im) im.style.transform = 'scale(' + (1.25 - 0.25 * t + d * 0.05).toFixed(3) + ')';
                const iw = c.querySelector('[data-simgwrap]'); if (iw) iw.style.clipPath = 'inset(' + ((1 - t) * 30).toFixed(1) + '% 0 0 0 round 0px)';
                const ti = c.querySelector('[data-stitle]'); if (ti) ti.style.transform = 'translate3d(0,' + ((1 - t) * 100).toFixed(1) + '%,0)';
                c.querySelectorAll('[data-stag]').forEach((tg, j) => { const a = Math.min(1, Math.max(0, t * 1.6 - 0.6 - j * 0.08)); tg.style.opacity = a.toFixed(3); tg.style.display = 'inline-block'; tg.style.transform = 'translateY(' + (10 * (1 - a)).toFixed(1) + 'px)'; });
              });
            });
            document.querySelectorAll('[data-about]').forEach(sec => {
              const r = sec.getBoundingClientRect();
              if (r.bottom < 0 || r.top > vh) return;
              const p = Math.min(1, Math.max(0, -r.top / Math.max(1, r.height - vh)));
              const sm = (a, b) => { const x = Math.min(1, Math.max(0, (p - a) / (b - a))); return x < 0.5 ? 4 * x * x * x : 1 - Math.pow(-2 * x + 2, 3) / 2; };
              const q = sec.querySelector.bind(sec), now = performance.now();
              const words = q('[data-awords]');
              if (words) { const ws = words.children, n = ws.length, lit = Math.min(1, p / 0.26) * n; for (let i = 0; i < n; i++) ws[i].style.opacity = i < lit ? '1' : '0.14'; }
              const ex = sm(0.4, 0.75);
              const wrap = q('[data-aimgwrap]');
              if (wrap) { const ty = 50 * (1 - ex), tx = 50 * (1 - ex); wrap.style.clipPath = 'inset(' + ty + '% ' + tx + '% ' + ty + '% ' + tx + '% round ' + (28 * (1 - ex)).toFixed(1) + 'px)'; }
              const im = q('[data-aimg]'); if (im) im.style.transform = 'scale(' + (1.35 - 0.35 * ex).toFixed(3) + ') translateY(' + ((0.5 - p) * 40).toFixed(1) + 'px)';
              const tf = sm(0.3, 0.45), t = q('[data-atext]');
              if (t) { t.style.opacity = (1 - tf).toFixed(3); t.style.transform = 'translateY(' + (-80 * tf).toFixed(1) + 'px) scale(' + (1 - 0.08 * tf).toFixed(3) + ')'; }
              sec.querySelectorAll('[data-achip]').forEach((c, i) => {
                const k = sm(0.3, 0.55), dx = (+c.dataset.x - 45), dy = (+c.dataset.y - 50);
                const fy = Math.sin(now * 0.0013 + i * 1.9) * 10, fx = Math.cos(now * 0.0009 + i * 1.3) * 6;
                const intro = sm(0.0, 0.12);
                c.style.transform = 'translate(' + (dx * k * 9 + fx).toFixed(1) + 'px,' + (dy * k * 9 + fy + (1 - intro) * 60).toFixed(1) + 'px) scale(' + (0.6 + 0.4 * intro).toFixed(3) + ')';
                c.style.opacity = (intro * (1 - k)).toFixed(3);
              });
              const lb = q('[data-alabel]'); if (lb) lb.parentElement.style.color = ex > 0.6 ? '#f3f0ea' : '#141210';
              const bar = q('[data-abar]'); if (bar) bar.style.transform = 'scaleY(' + p.toFixed(3) + ')';
              const pn = q('[data-apanel]'), pe = sm(0.7, 0.88);
              if (pn) pn.style.transform = 'translateY(' + (120 * (1 - pe)).toFixed(1) + '%)';
              sec.querySelectorAll('[data-atag]').forEach((tg, i) => { const a = sm(0.82 + i * 0.025, 0.9 + i * 0.025); tg.style.opacity = a.toFixed(3); tg.style.transform = 'translateY(' + (12 * (1 - a)).toFixed(1) + 'px) scale(' + (0.85 + 0.15 * a).toFixed(3) + ')'; tg.style.display = 'inline-block'; });
            });
            document.querySelectorAll('[data-fan]').forEach(g => {
              const r = g.getBoundingClientRect();
              let p = Math.min(1, Math.max(0, (vh * 0.95 - r.top) / (vh * 0.55)));
              p = 1 - Math.pow(1 - p, 3);
              const cards = g.querySelectorAll('[data-fancard]'), n = cards.length, now = performance.now(), gw = g.offsetWidth / 2;
              cards.forEach((c, i) => {
                const dx = gw - (c.offsetLeft + c.offsetWidth / 2);
                const pile = [-8, 6, -3, 10][i % 4];
                const fl = Math.sin(now * 0.0011 + i * 1.7) * 7 * p;
                const fr = Math.sin(now * 0.0008 + i * 2.3) * 0.8 * p;
                c.style.transform = 'translate3d(' + (dx * (1 - p)).toFixed(1) + 'px,' + ((1 - p) * 120 + fl).toFixed(1) + 'px,0) rotate(' + (pile * (1 - p) + fr).toFixed(2) + 'deg)';
                c.style.opacity = Math.min(1, 0.2 + p * 1.2).toFixed(2);
              });
            });
            document.querySelectorAll('[data-magnet]').forEach(el => {
              const r = el.getBoundingClientRect(), cx = r.left + r.width / 2 - (el.__x || 0), cy = r.top + r.height / 2 - (el.__y || 0);
              const dx = this.mx - cx, dy = this.my - cy, near = Math.hypot(dx, dy) < 180;
              el.__x = (el.__x || 0) + ((near ? dx * 0.35 : 0) - (el.__x || 0)) * 0.15;
              el.__y = (el.__y || 0) + ((near ? dy * 0.35 : 0) - (el.__y || 0)) * 0.15;
              el.style.transform = `translate3d(${el.__x.toFixed(1)}px,${el.__y.toFixed(1)}px,0)`;
            });
            this.raf = requestAnimationFrame(tick);
          };
          this.raf = requestAnimationFrame(tick);
        }

        componentDidUpdate(_, prev) { if (prev.page !== this.state.page || prev.wv !== this.state.wv || prev.wf !== this.state.wf) requestAnimationFrame(() => this.scan()); }

        componentWillUnmount() {
          cancelAnimationFrame(this.raf); clearInterval(this.timer); this.io && this.io.disconnect(); this.vio && this.vio.disconnect();
          window.removeEventListener('wheel', this.onWheel); window.removeEventListener('scroll', this.onScroll); window.removeEventListener('mousemove', this.onMove);
        }

        scan() {
          const { d } = this.motion();
          if (this.vio) document.querySelectorAll('[data-wvideo]:not([data-vo])').forEach(v => { v.setAttribute('data-vo', '1'); v.muted = true; this.vio.observe(v); });
          document.querySelectorAll('[data-reveal]:not([data-rv])').forEach(el => {
            el.setAttribute('data-rv', '1');
            const k = el.dataset.reveal;
            el.style.transition = 'none';
            if (k === 'line') { el.style.transform = 'translate3d(0,105%,0)'; const p = el.parentElement; p.__rvChild = el; this.io.observe(p); return; }
            if (k === 'img') el.style.clipPath = 'inset(18% 10% 0% 10% round 14px)';
            else { el.style.opacity = '0'; el.style.transform = `translate3d(0,${d}px,0)`; }
            this.io.observe(el);
          });
        }

        go(page) {
          return e => {
            e && e.preventDefault && e.preventDefault();
            if (this.busy) return;
            if (page === this.state.page) { this.setState({ menu: false }); this.target = 0; this.wheeling = true; return; }
            const a = this.curtainA.current, b = this.curtainB.current;
            if (!a || !b) return;
            this.busy = true;
            this.curtainLabel.current.textContent = this.labels[page];
            const ease = 'cubic-bezier(.7,0,.2,1)';
            a.style.transition = `transform 650ms ${ease}`; b.style.transition = `transform 650ms ${ease} 110ms`;
            a.style.transform = b.style.transform = 'translateY(0)';
            setTimeout(() => {
              this.setState({ page, sent: false, menu: false, svc: 0 });
              window.scrollTo(0, 0); this.target = this.cur = 0; this.wheeling = false;
              requestAnimationFrame(() => requestAnimationFrame(() => this.scan()));
              setTimeout(() => this.scan(), 120);
              setTimeout(() => {
                this.scan();
                b.style.transition = `transform 700ms ${ease}`; a.style.transition = `transform 700ms ${ease} 110ms`;
                a.style.transform = b.style.transform = 'translateY(-100%)';
                setTimeout(() => { a.style.transition = b.style.transition = 'none'; a.style.transform = b.style.transform = 'translateY(100%)'; this.busy = false; }, 900);
              }, 260);
            }, 800);
          };
        }

        renderVals() {
          const { page, svc, proc, t, menu, scrolled } = this.state; const svcH = this.state.svcH ?? -1; const wf = this.state.wf ?? 'All', wv = this.state.wv ?? 'grid', wh = this.state.wh ?? -1;
          const img = p => {
          const customMapping = {
            'videos/01.jpg': '/uploads/Rectangle 39447.jpg',
            'videos/02.jpg': '/uploads/Rectangle 39449.jpg',
            'videos/03.jpg': '/uploads/Rectangle 39451.jpg',
            'videos/04.jpg': '/uploads/Rectangle 39452.jpg',
          };
          if (customMapping[p]) {
            return '/' + customMapping[p]; 
          }
          return 'https://briefffly.studio/assets/' + p;
        };
        const projects = [
          ['Fashion App', ['Mobile App', 'UI/UX', 'E-Commerce', 'Lifestyle'], 'videos/01.jpg'],
          ['Co-Working Space Booking System', ['Mobile App', 'Website', 'Branding', 'SaaS', 'Booking Platform'], 'videos/02.jpg'],
          ['Mental Health Platform', ['Mobile App', 'Website', 'Branding', 'Therapy Booking', 'HealthTech'], 'videos/03.jpg'],
          ['Finance Management Platform', ['Web App', 'Mobile App', 'Expense Tracking', 'Enterprise Solution'], 'videos/04.jpg']
        ].map(([title, tags, src], i) => { const c = [['#ff4d1f', '#141210'], ['#dcff4f', '#141210'], ['#f3f0ea', '#141210'], ['#2c2925', '#f3f0ea']][i]; return { num: String(i + 1).padStart(2, '0'), title, tags, img: img(src), offset: i % 2 ? 'clamp(0px,9vw,140px)' : '0px', bg: c[0], fg: c[1], z: i + 1, wOp: wh === i ? 1 : 0, wScale: wh === i ? 1 : 1.15 }; });
          const workPal = [['#ff4d1f', '#141210'], ['#dcff4f', '#141210'], ['#141210', '#f3f0ea'], ['#e6e1d8', '#141210']];
          const works = [
            ['Fashion App', ['Mobile App', 'UI/UX', 'E-Commerce', 'Lifestyle'], '01.jpg', '01.mp4', ['Fashion', 'App'], 'A mobile shopping experience for a lifestyle fashion label, built around browsing, styling and checkout.'],
            ['Co-Working Space Booking System', ['Mobile App', 'Website', 'Branding', 'SaaS', 'Booking Platform'], '02.jpg', '02.mp4', ['Co-Working Space', 'Booking System'], 'A SaaS booking platform that lets members find, reserve and manage workspace across web and mobile.'],
            ['Mental Health Platform', ['Mobile App', 'Website', 'Branding', 'Therapy Booking', 'HealthTech'], '03.jpg', '03.mp4', ['Mental Health', 'Platform'], 'A HealthTech product that connects people with therapists, with booking, brand and web presence in one system.'],
            ['Finance Management Platform', ['Web App', 'Mobile App', 'Expense Tracking', 'Enterprise Solution'], '04.jpg', '04.mp4', ['Finance', 'Management Platform'], 'An enterprise web and mobile app for tracking expenses and keeping company spending clear.'],
            ['Invitation & Stationery Design Studio', ['Mobile App', 'Website', 'Branding', 'Creative Studio', 'E-Commerce'], '05.png', '05.mp4', ['Invitation & Stationery', 'Design Studio'], 'Brand, website and app for a creative studio selling custom invitations and stationery online.'],
            ['Digital Banking App', ['Mobile App', 'Branding', 'FinTech', 'Secure Banking'], '07.png', '07.mp4', ['Digital Banking', 'App'], 'A secure FinTech banking app with a brand built on trust and clarity.'],
            ['Artisan Marketplace', ['Branding', 'Visual Identity', 'Creative Direction', 'Marketplace'], '06.png', '06.mp4', ['Artisan', 'Marketplace'], 'Visual identity and creative direction for a marketplace of handmade goods.']
          ].map(([title, tags, im, vid, lines, desc], i) => { const c = workPal[i % 4]; return { num: String(i + 1).padStart(2, '0'), title, tags, desc, cat: tags[0], img: img('videos/' + im), video: img('videos/' + vid), bg: c[0], fg: c[1], titleLines: lines.map((text, j) => ({ text, delay: j * 90 })), scope: tags.map((t, j) => ({ t, n: String(j + 1).padStart(2, '0'), delay: (j * 40) + 'ms' })), wOp: wh === i ? 1 : 0, wScale: wh === i ? 1 : 1.15 }; });
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
          const themes = [['#141210', '#f3f0ea', '#2c2925'], ['#f3f0ea', '#141210', '#e6e1d8']];
          const services = svcRaw.map(([name, title, homeImg, pageImg, desc, bullets, subs], i) => {
            const th = themes[i % 2];
            return {
              num: String(i + 1).padStart(2, '0'), name, title, desc, bullets, subs: subs.map(([t, d], j) => ({ t, d, delay: (j * 50) + 'ms' })),
              img: img('images/homepage/' + homeImg), pageImg: img('images/services-page/' + pageImg),
              onEnter: () => this.setState({ svc: i }),
              rowBg: svc === i ? '#ff4d1f' : 'transparent', onHover: () => this.setState({ svcH: i }), dir: i % 2 ? -1 : 1, fill: svcH === i ? 'inset(0 0% 0 0)' : 'inset(0 100% 0 0)', rowBg2: svcH === i ? '#ff4d1f' : 'transparent', numBg: svcH === i ? '#dcff4f' : 'transparent', arrowRot2: svcH === i ? '45deg' : '0deg', subOp: svcH === i ? 1 : 0, subX: svcH === i ? '0px' : '10px', floatImgOp: svcH === i ? 1 : 0, floatImgScale: svcH === i ? 1 : 1.15, openRows: svc === i ? '1fr' : '0fr', arrowRot: svc === i ? '45deg' : '0deg',
              sectionBg: th[0], sectionFg: th[1], cardBg: th[2], order: i % 2 ? 2 : 0
            };
          });
          const navDefs = [['home', 'Home'], ['services', 'Services'], ['work', 'Our Works'], ['studio', 'Our Studio'], ['blog', 'Blog'], ['contact', 'Contact Us']];
          const navItems = navDefs.slice(1).map(([k, label]) => ({ label, onClick: this.go(k) }));
          const menuItems = navDefs.map(([k, label], i) => ({ label, num: String(i + 1).padStart(2, '0'), onClick: this.go(k), color: page === k ? '#ff4d1f' : '#f3f0ea', delay: (menu ? 200 + i * 60 : 0) + 'ms' }));
          const posts = [
            ['August 23, 2025', 'Top Designing Agency to Elevate Your Business in 2025', 'In today\'s fast-paced digital world, design has become more than just a way to make things seem good.', 'top-designing-agency-to-elevate-your-business-in-2025.png'],
            ['August 25, 2025', 'Best AI Tools Every Designer Should Try in 2025', 'The design world is changing faster than ever, and 2025 is proving to be a turning point.', 'best-ai-tools-every-designer-should-try-in-2025.png'],
            ['August 31, 2025', 'The Ultimate Guide to Design: Pro Tips, Tricks & Best Practices', 'Design is more than just making something look appealing-- it is about resolving problems, enhancing functionality, and producing meaningful experiences.', 'the-ultimate-guide-to-design-pro-tips-tricks-best-practices.png']
          ].map(([date, title, excerpt, f], i) => ({ date, title, excerpt, img: img('images/blog/' + f), delay: i * 110 }));
          const a1 = img('images/testimonials/author1.jpg'), a2 = img('images/testimonials/author2.jpg');
          const testimonials = [
            ['Briefffly Design Studio transformed our vision into a stunning reality. Truly impressive work!', 'Alex R.', 'Brand Owner', a1],
            ['Professional, creative, and always on time. They made the entire process stress-free.', 'Priya S.', 'Startup Founder', a2],
            ['Their attention to detail and innovative approach set them apart from the rest.', 'David M.', 'Marketing Head', a1],
            ['We saw a real boost in engagement after our new design went live. Highly recommended!', 'Riya P.', 'Business Owner', a2]
          ].map(([quote, name, role, im], i) => {
            const rot = [-5, 4, -3, 5][i], y = [36, 0, 48, 16][i], hv = this.state.hoverT === i;
            const pal = [['#fbfaf8', '#141210', '#ff4d1f'], ['#141210', '#f3f0ea', '#dcff4f'], ['#ff4d1f', '#141210', '#141210'], ['#e6e1d8', '#141210', '#ff4d1f']][i];
            return { quote, name, role, img: im, delay: i * 110, ml: i ? 'calc(-1 * clamp(20px,3.6vw,56px))' : '0px',
              z: hv ? 10 : i + 1, bg: pal[0], fg: pal[1], accent: pal[2],
              transform: hv ? 'translateY(' + (y - 28) + 'px) rotate(0deg) scale(1.04)' : 'translateY(' + y + 'px) rotate(' + rot + 'deg)',
              shadow: hv ? '0 30px 60px rgba(20,18,16,0.22)' : '0 12px 30px rgba(20,18,16,0.10)',
              onEnter: () => this.setState({ hoverT: i }) };
          });
          const process = [
            ['Discovery & Strategy', 'We begin by understanding your brand, goals, and audience to create a clear roadmap.', 'Discovery-Strategy.png'],
            ['Design and Prototyping', 'Our team crafts engaging visuals and prototypes to bring your ideas to life.', 'Design-Prototyping.png'],
            ['Development and Testing', 'We build your project with precision and test it for smooth, reliable performance.', 'Development-Testing.png'],
            ['Launch and Support', 'We launch your project and provide ongoing updates to keep it performing at its best.', 'Launch-Support.png']
          ].map(([title, text, f], i) => { const o = proc === i; return { num: String(i + 1).padStart(2, '0'), title, text, img: img('images/homepage/' + f), delay: i * 110, onToggle: () => this.setState(s => ({ proc: s.proc === i ? -1 : i })), rows: o ? '1fr' : '0fr', textOpacity: o ? 1 : 0, titleColor: o ? '#ff4d1f' : '#141210', chevron: o ? '180deg' : '0deg', btnBg: o ? '#141210' : '#d8d4cc', btnFg: o ? '#f3f0ea' : '#141210', markerBg: o ? '#ff4d1f' : '#141210', shadow: o ? '0 16px 40px rgba(20,18,16,0.08)' : 'none' }; });
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
          ].map(([title, text], i) => ({ num: String(i + 1).padStart(2, '0'), title, text, delay: i * 90 }));
          const team = [['Aarav Patel', 'Co-Founder & CEO'], ['Ethan Walker', 'Co-Founder & Creative Director'], ['Ananya Sharma', 'Content Writer'], ['Neha Verma', 'UI/UX Designer'], ['Michael Johnson', 'UI/UX Designer'], ['Karan Joshi', 'Motion Graphic Designer'], ['Olivia Martinez', '3D Designer'], ['Riya Kapoor', 'Marketing Executive']].map(([name, role]) => ({ name, role }));
          const packages = [
            { name: 'Startup Pack', sub: 'Perfect for new brands & small businesses', bg: '#f3f0ea', fg: '#141210', rule: '#d8d4cc', delay: 0,
              includes: ['Logo Design & Basic Brand Identity', 'One-Page Website or Landing Page', '5 Social Media Creatives (Static)', 'Basic SEO Optimization', '1 Round of Revisions per deliverable'],
              extras: ['Affordable', 'Fast delivery timelines', 'Ideal for MVPs & product launches'] },
            { name: 'Enterprise Pack', sub: 'Built for established brands & growth-focused businesses.', bg: '#141210', fg: '#f3f0ea', rule: '#2c2925', delay: 120,
              includes: ['Full Brand Identity & Guidelines', 'Multi-Page Website or eCommerce Store', '15 Social Media Creatives (Static + Motion)', 'Mobile App UI/UX Design (Up to X screens)', 'Advanced SEO Optimization', '3D Product Animation (Short Clip)', 'Multiple Revision Rounds'],
              extras: ['Priority project scheduling', 'Dedicated account manager', 'Scalable design solutions across platforms'] }
          ];
          const inner = {
            work: ['Popular Works', 'Our', 'Works'], services: ['Services', 'Services That Turn', 'Your Vision Into Reality'],
            studio: ['Our Studio', 'Briefffly', 'Studio'], blog: ['Blog & News', 'Explore Latest', 'Insights'], contact: ['Contact Information', 'Contact', 'Us']
          }[page] || ['', '', ''];
          const mA = ['Web Design Agency', 'Development', 'Web Design', 'Mobile Apps Design'];
          const mS = ['Brand Identity Design Services', 'Web & Mobile UI/UX Design', 'Social & Digital Creatives', 'Visual Systems & Guidelines', 'Pitch Deck Design Services', 'Creative Consultant Services'];
          return {
            curtainA: this.curtainA, curtainB: this.curtainB, curtainLabel: this.curtainLabel,
            isHome: page === 'home', isInner: page !== 'home', isWork: page === 'work', isServices: page === 'services', isStudio: page === 'studio', isBlog: page === 'blog', isContact: page === 'contact',
            innerEyebrow: inner[0], innerTitle1: inner[1], innerTitle2: inner[2],
            goHome: this.go('home'), goStudio: this.go('studio'), goWork: this.go('work'), goServices: this.go('services'), goContact: this.go('contact'), goBlog: this.go('blog'),
            toggleMenu: () => this.setState(s => ({ menu: !s.menu })),
            menuClip: menu ? 'circle(150% at calc(100% - 80px) 34px)' : 'circle(0% at calc(100% - 80px) 34px)',
            menuItemY: menu ? '0%' : '110%',
            navBg: scrolled ? 'rgba(243,240,234,0.82)' : 'transparent', navBorder: scrolled ? 'rgba(20,18,16,0.1)' : 'transparent',
            navItems, menuItems, projects, services, posts, testimonials, process, studioSteps, howWeWork, team, packages,
            aboutWords: 'Transforming Ideas Into Designs That Inspire & Connect'.split(' '),
            disciplines: ['Web Design', 'Branding', 'Mobile App Design', 'Social Creatives', '3D Animation'].map((name, i) => ({ name, num: String(i + 1).padStart(2, '0') })),
            specialty: ['Global brand collaborations', 'Expert, trained design consultants', 'Proven brand identity & UI/UX success', 'Scalable solutions across industries'],
            marqueeA: [...mA, ...mA, ...mA, ...mA], marqueeServices: [...mS, ...mS], marqueeB: Array(8).fill('Get In Touch'),
            workFilters: ['All', 'Mobile App', 'Website', 'Branding', 'Web App'].map(label => { const on = wf === label; return { label, count: label === 'All' ? works.length : works.filter(p => p.tags.includes(label)).length, onClick: () => this.setState({ wf: label, wh: -1 }), bg: on ? '#141210' : 'transparent', fg: on ? '#f3f0ea' : '#141210', cBg: on ? '#ff4d1f' : '#141210', cFg: on ? '#141210' : '#f3f0ea' }; }),
            works, workTotal: String(works.length).padStart(2, '0'),
            workList: works.filter(p => wf === 'All' || p.tags.includes(wf)).map((p, k) => { const i = +p.num - 1, hv = wh === i, dim = wh >= 0 && !hv; return { ...p, onEnter: () => this.setState({ wh: i }), onClick: this.go('contact'), mediaOrder: k % 2 ? 2 : 0, textOrder: 1, dir: k % 2 ? -1 : 1, cursor: hv ? 'none' : 'pointer', numY: hv ? '-12px' : '0px', scopeX: hv ? '10px' : '0px', rowBg: hv ? p.bg : 'transparent', rowFg: hv ? p.fg : (dim ? '#8a857b' : '#141210'), shift: hv ? '18px' : '0px', arrow: hv ? '45deg' : '0deg' }; }),
            workCount: String(works.filter(p => wf === 'All' || p.tags.includes(wf)).length).padStart(2, '0'),
            isGrid: wv === 'grid', isList: wv === 'list', viewX: wv === 'grid' ? '0%' : '100%', gridFg: wv === 'grid' ? '#141210' : '#f3f0ea', listFg: wv === 'list' ? '#141210' : '#f3f0ea',
            setGrid: () => this.setState({ wv: 'grid', wh: -1 }), setList: () => this.setState({ wv: 'list', wh: -1 }),
            leaveWork: () => this.setState({ wh: -1 }), wCurOp: page === 'work' && wh >= 0 ? 1 : 0, wCurScale: wh >= 0 ? 1 : 0.4,
            leaveT: () => this.setState({ hoverT: -1 }), leaveSvc: () => this.setState({ svcH: -1 }), floatOp: page === 'home' && svcH >= 0 ? 1 : 0, floatScale: svcH >= 0 ? 1 : 0.6,
            nextT: () => { this.paused = true; this.setState(s => ({ t: (s.t + 1) % 4 })); },
            prevT: () => { this.paused = true; this.setState(s => ({ t: (s.t + 3) % 4 })); },
            name: this.state.name, onName: e => this.setState({ name: e.target.value}),
            email: this.state.email, onEmail: e => this.setState({ email: e.target.value}),
            message: this.state.message, onMessage: e => this.setState({ message: e.target.value}),
            subjects: ['Web Design', 'SEO Services', 'Development', 'Branding', 'Other'], subject: this.state.subject,
            onSubject: e => this.setState({ subject: e.target.value }),
            formSent: this.state.sent, formOpen: !this.state.sent, 
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
