@extends('layouts.app')

@section('title', 'Briefffly')

@section('content')
@verbatim
<x-dc>
      <helmet>
        <link
          rel="stylesheet"
          href="/css/ds/tokens/fonts.css"
        />
        <link
          rel="stylesheet"
          href="/css/ds/tokens/colors.css"
        />
        <link
          rel="stylesheet"
          href="/css/ds/tokens/typography.css"
        />
        <link
          rel="stylesheet"
          href="/css/ds/tokens/spacing.css"
        />
        <link
          rel="stylesheet"
          href="/css/ds/tokens/effects.css"
        />
        <link
          rel="stylesheet"
          href="/css/ds/styles.css"
        />
        <script src="/js/ds/_ds_bundle.js"></script>
        <link rel="stylesheet" href="/css/briefffly-v1.css" />
      </helmet>

      <div
        style="
          font-family: var(--font-body);
          background: var(--paper);
          color: var(--ink);
          min-height: 100vh;
          overflow-x: clip;
        "
      >
        <!-- NAV -->
        <header
          style="
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 50;
            background: rgba(251, 250, 248, 0.78);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-bottom: 1px solid var(--border-subtle);
          "
        >
          <div
            style="
              max-width: 1360px;
              margin: 0 auto;
              padding: 0 clamp(20px, 5vw, 64px);
              height: 72px;
              display: flex;
              align-items: center;
              justify-content: space-between;
              gap: 24px;
            "
          >
            <a
              href="#"
              onClick="{{ goHome }}"
              style="
                font-family: var(--font-display);
                font-size: 26px;
                font-weight: 600;
                letter-spacing: -0.02em;
                color: var(--ink);
              "
              >Briefffly</a
            >
            <nav
              style="
                display: flex;
                align-items: center;
                gap: clamp(14px, 2.4vw, 32px);
                flex-wrap: wrap;
                justify-content: flex-end;
              "
            >
              <sc-for list="{{ navItems }}" as="n" hint-placeholder-count="5">
                <a
                  href="#"
                  onClick="{{ n.onClick }}"
                  style="font-size:var(--text-body-sm);font-weight:500;color:{{ n.color }};display:flex;align-items:center;gap:6px;transition:color 120ms"
                  >{{ n.label }}</a
                >
              </sc-for>
              <x-import
                component-from-global-scope="UniversalDesignSystem_25b065.Button"
                size="sm"
                on-click="{{ goContact }}"
                hint-size="130px,38px"
                >Start a project</x-import
              >
            </nav>
          </div>
        </header>

        <main ref="{{ mainRef }}" style="padding-top: 72px">
          <!-- ================= HOME ================= -->
          <sc-if value="{{ isHome }}" hint-placeholder-val="{{ true }}">
            <section
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: clamp(56px, 9vw, 128px) clamp(20px, 5vw, 64px) 48px;
              "
            >
              <div
                data-reveal="up"
                style="
                  font-size: var(--text-eyebrow);
                  letter-spacing: 0.14em;
                  text-transform: uppercase;
                  color: var(--text-tertiary);
                  margin-bottom: 28px;
                "
              >
                Web design agency
              </div>
              <h1
                style="
                  margin: 0;
                  font-family: var(--font-display);
                  font-weight: 400;
                  font-size: clamp(3.25rem, 10vw, 9.5rem);
                  line-height: 0.98;
                  letter-spacing: -0.035em;
                "
              >
                <span
                  style="
                    display: block;
                    overflow: hidden;
                    padding-bottom: 0.06em;
                  "
                  ><span data-reveal="line" style="display: block"
                    >Bold Design.</span
                  ></span
                >
                <span
                  style="
                    display: block;
                    overflow: hidden;
                    padding-bottom: 0.06em;
                  "
                  ><span
                    data-reveal="line"
                    data-delay="90"
                    style="display: block"
                    >Delivered
                    <em style="color: var(--accent)">Briefffly</em></span
                  ></span
                >
              </h1>
              <div
                style="
                  display: grid;
                  grid-template-columns: repeat(
                    auto-fit,
                    minmax(min(100%, 340px), 1fr)
                  );
                  gap: 32px;
                  margin-top: 56px;
                  align-items: end;
                "
              >
                <p
                  data-reveal="up"
                  data-delay="250"
                  style="
                    margin: 0;
                    max-width: 520px;
                    font-size: var(--text-body-lg);
                    line-height: 1.6;
                    color: var(--text-secondary);
                    text-wrap: pretty;
                  "
                >
                  We transform quick briefs into stunning
                  <strong style="color: var(--ink); font-weight: 600"
                    >brand identities, UI/UX designs</strong
                  >, and digital visuals that speak for your brand — fast,
                  functional, and unforgettable.
                </p>
                <div
                  data-reveal="up"
                  data-delay="350"
                  style="
                    display: flex;
                    justify-content: flex-end;
                    gap: 12px;
                    flex-wrap: wrap;
                  "
                >
                  <x-import
                    component-from-global-scope="UniversalDesignSystem_25b065.Button"
                    size="lg"
                    on-click="{{ goWork }}"
                    hint-size="230px,56px"
                    >Explore Our Projects</x-import
                  >
                </div>
              </div>
            </section>
            <div
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: 0 clamp(20px, 5vw, 64px);
              "
            >
              <div
                data-reveal="img"
                style="
                  position: relative;
                  overflow: hidden;
                  border-radius: 8px;
                  aspect-ratio: 16/8;
                  background: var(--ink-05);
                "
              >
                <img
                  data-parallax="0.12"
                  src="https://briefffly.studio/assets/images/homepage/Hero.png"
                  alt="Briefffly work"
                  style="
                    position: absolute;
                    left: 0;
                    top: -10%;
                    width: 100%;
                    height: 120%;
                    object-fit: cover;
                    display: block;
                  "
                />
              </div>
            </div>

            <div
              style="
                margin-top: clamp(64px, 8vw, 120px);
                border-top: 1px solid var(--border-default);
                border-bottom: 1px solid var(--border-default);
                padding: 28px 0;
                overflow: hidden;
              "
            >
              <div
                data-marquee="1"
                data-speed="1"
                style="
                  display: flex;
                  width: max-content;
                  will-change: transform;
                "
              >
                <sc-for list="{{ marqueeA }}" as="m" hint-placeholder-count="8">
                  <span
                    style="
                      display: flex;
                      align-items: center;
                      gap: 40px;
                      padding-right: 40px;
                      font-family: var(--font-display);
                      font-size: clamp(2.5rem, 6vw, 5rem);
                      line-height: 1;
                      letter-spacing: -0.02em;
                      white-space: nowrap;
                    "
                    >{{ m }}<span
                      style="
                        width: 14px;
                        height: 14px;
                        border-radius: 999px;
                        background: var(--accent);
                        display: block;
                      "
                    ></span
                  ></span>
                </sc-for>
              </div>
            </div>

            <section
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: clamp(80px, 11vw, 160px) clamp(20px, 5vw, 64px);
              "
            >
              <div
                style="
                  display: grid;
                  grid-template-columns: repeat(
                    auto-fit,
                    minmax(min(100%, 420px), 1fr)
                  );
                  gap: clamp(40px, 6vw, 96px);
                "
              >
                <div>
                  <div
                    data-reveal="up"
                    style="
                      font-size: var(--text-eyebrow);
                      letter-spacing: 0.14em;
                      text-transform: uppercase;
                      color: var(--text-tertiary);
                      margin-bottom: 20px;
                    "
                  >
                    About Agency
                  </div>
                  <h2
                    data-reveal="up"
                    style="
                      margin: 0;
                      font-family: var(--font-display);
                      font-weight: 400;
                      font-size: var(--text-display-2);
                      line-height: 1.08;
                      letter-spacing: -0.02em;
                      text-wrap: balance;
                    "
                  >
                    Transforming Ideas Into Designs That Inspire &amp; Connect
                  </h2>
                  <div
                    data-reveal="img"
                    style="
                      position: relative;
                      overflow: hidden;
                      border-radius: 8px;
                      aspect-ratio: 4/3;
                      margin-top: 48px;
                      background: var(--ink-05);
                    "
                  >
                    <img
                      data-parallax="0.1"
                      src="https://briefffly.studio/assets/images/homepage/About-1.png"
                      alt="About Briefffly"
                      style="
                        position: absolute;
                        left: 0;
                        top: -10%;
                        width: 100%;
                        height: 120%;
                        object-fit: cover;
                      "
                    />
                  </div>
                </div>
                <div
                  style="
                    display: flex;
                    flex-direction: column;
                    gap: 24px;
                    justify-content: flex-end;
                  "
                >
                  <p
                    data-reveal="up"
                    style="
                      margin: 0;
                      font-size: var(--text-body-lg);
                      line-height: 1.6;
                      color: var(--text-secondary);
                      text-wrap: pretty;
                    "
                  >
                    At Briefffly Design Studio, we blend creativity and strategy
                    to craft designs that not only look stunning but also
                    deliver real impact. From sleek websites to engaging mobile
                    applications, our work helps brands stand out in the digital
                    landscape.
                  </p>
                  <p
                    data-reveal="up"
                    style="
                      margin: 0;
                      font-size: var(--text-body);
                      line-height: 1.6;
                      color: var(--text-secondary);
                      text-wrap: pretty;
                    "
                  >
                    Our team of passionate designers and developers is dedicated
                    to turning your vision into powerful digital experiences
                    that resonate with your audience.
                  </p>
                  <div
                    data-reveal="up"
                    style="display: flex; flex-wrap: wrap; gap: 8px"
                  >
                    <sc-for
                      list="{{ disciplines }}"
                      as="d"
                      hint-placeholder-count="5"
                    >
                      <x-import
                        component-from-global-scope="UniversalDesignSystem_25b065.Tag"
                        hint-size="110px,28px"
                        >{{ d }}</x-import
                      >
                    </sc-for>
                  </div>
                  <div data-reveal="up" style="margin-top: 16px">
                    <x-import
                      component-from-global-scope="UniversalDesignSystem_25b065.Button"
                      variant="secondary"
                      on-click="{{ goStudio }}"
                      hint-size="180px,48px"
                      >Meet the studio</x-import
                    >
                  </div>
                </div>
              </div>
            </section>

            <section
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: 0 clamp(20px, 5vw, 64px) clamp(80px, 11vw, 160px);
              "
            >
              <div
                style="
                  display: flex;
                  justify-content: space-between;
                  align-items: end;
                  gap: 24px;
                  flex-wrap: wrap;
                  margin-bottom: 48px;
                "
              >
                <div>
                  <div
                    data-reveal="up"
                    style="
                      font-size: var(--text-eyebrow);
                      letter-spacing: 0.14em;
                      text-transform: uppercase;
                      color: var(--text-tertiary);
                      margin-bottom: 20px;
                    "
                  >
                    Popular Works
                  </div>
                  <h2
                    data-reveal="up"
                    style="
                      margin: 0;
                      font-family: var(--font-display);
                      font-weight: 400;
                      font-size: var(--text-display-2);
                      line-height: 1.08;
                      letter-spacing: -0.02em;
                    "
                  >
                    Explore Our Latest Projects
                  </h2>
                </div>
                <div data-reveal="up">
                  <x-import
                    component-from-global-scope="UniversalDesignSystem_25b065.Button"
                    variant="secondary"
                    on-click="{{ goWork }}"
                    hint-size="170px,48px"
                    >Explore Projects</x-import
                  >
                </div>
              </div>
              <div
                onMouseLeave="{{ clearHover }}"
                style="border-top: 1px solid var(--border-default)"
              >
                <sc-for list="{{ projects }}" as="p" hint-placeholder-count="4">
                  <a
                    href="#"
                    data-reveal="up"
                    onClick="{{ goWork }}"
                    onMouseEnter="{{ p.onEnter }}"
                    style="
                      display: grid;
                      grid-template-columns: 56px minmax(0, 1fr) auto;
                      align-items: center;
                      gap: 24px;
                      padding: clamp(24px, 3vw, 40px) 0;
                      border-bottom: 1px solid var(--border-default);
                      color: var(--ink);
                    "
                  >
                    <span
                      style="
                        font-family: var(--font-mono);
                        font-size: var(--text-caption);
                        color: var(--text-tertiary);
                      "
                      >{{ p.num }}</span
                    >
                    <span
                      style="
                        display: flex;
                        flex-direction: column;
                        gap: 10px;
                        min-width: 0;
                      "
                    >
                      <span
                        style="font-family:var(--font-display);font-size:clamp(1.75rem,4vw,3.25rem);line-height:1.05;letter-spacing:-0.02em;transition:transform 400ms cubic-bezier(.2,.7,.2,1),color 220ms;transform:translateX({{ p.shift }});color:{{ p.titleColor }}"
                        >{{ p.title }}</span
                      >
                      <span
                        style="
                          font-size: var(--text-body-sm);
                          color: var(--text-tertiary);
                        "
                        >{{ p.tagline }}</span
                      >
                    </span>
                    <span
                      style="font-size:28px;line-height:1;transition:transform 400ms cubic-bezier(.2,.7,.2,1);transform:rotate({{ p.arrowRot }})"
                      >→</span
                    >
                  </a>
                </sc-for>
              </div>
            </section>

            <section
              style="
                background: var(--surface-sunken);
                padding: clamp(80px, 11vw, 160px) 0;
              "
            >
              <div
                style="
                  max-width: 1360px;
                  margin: 0 auto;
                  padding: 0 clamp(20px, 5vw, 64px);
                "
              >
                <div
                  data-reveal="up"
                  style="
                    font-size: var(--text-eyebrow);
                    letter-spacing: 0.14em;
                    text-transform: uppercase;
                    color: var(--text-tertiary);
                    margin-bottom: 20px;
                  "
                >
                  Services
                </div>
                <h2
                  data-reveal="up"
                  style="
                    margin: 0 0 56px;
                    font-family: var(--font-display);
                    font-weight: 400;
                    font-size: var(--text-display-2);
                    line-height: 1.08;
                    letter-spacing: -0.02em;
                  "
                >
                  Creative &amp; Modern Services
                </h2>
                <div
                  style="
                    display: grid;
                    grid-template-columns: repeat(
                      auto-fit,
                      minmax(min(100%, 420px), 1fr)
                    );
                    gap: clamp(32px, 5vw, 80px);
                    align-items: start;
                  "
                >
                  <div style="border-top: 1px solid var(--border-default)">
                    <sc-for
                      list="{{ services }}"
                      as="s"
                      hint-placeholder-count="5"
                    >
                      <a
                        href="#"
                        data-reveal="up"
                        onClick="{{ goServices }}"
                        onMouseEnter="{{ s.onEnter }}"
                        style="display:flex;align-items:baseline;gap:24px;padding:24px 0;border-bottom:1px solid var(--border-default);color:{{ s.color }};transition:color 220ms"
                      >
                        <span
                          style="
                            font-family: var(--font-mono);
                            font-size: var(--text-caption);
                            color: var(--text-tertiary);
                            width: 28px;
                          "
                          >{{ s.num }}</span
                        >
                        <span
                          style="
                            flex: 1;
                            font-family: var(--font-display);
                            font-size: clamp(1.5rem, 3vw, 2.25rem);
                            letter-spacing: -0.02em;
                            line-height: 1.1;
                          "
                          >{{ s.name }}</span
                        >
                        <span
                          style="font-size:22px;transition:transform 220ms,opacity 220ms;opacity:{{ s.arrowOpacity }};transform:translateX({{ s.arrowShift }})"
                          >→</span
                        >
                      </a>
                    </sc-for>
                  </div>
                  <div
                    data-reveal="img"
                    style="
                      position: sticky;
                      top: 112px;
                      aspect-ratio: 4/3;
                      border-radius: 8px;
                      overflow: hidden;
                      background: var(--ink-10);
                    "
                  >
                    <sc-for
                      list="{{ services }}"
                      as="s"
                      hint-placeholder-count="1"
                    >
                      <img
                        src="{{ s.img }}"
                        alt="{{ s.name }}"
                        style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;transition:opacity 500ms cubic-bezier(.4,0,.2,1),transform 900ms cubic-bezier(.2,.7,.2,1);opacity:{{ s.imgOpacity }};transform:scale({{ s.imgScale }})"
                      />
                    </sc-for>
                  </div>
                </div>
              </div>
            </section>

            <section
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: clamp(80px, 11vw, 160px) clamp(20px, 5vw, 64px);
              "
            >
              <div
                data-reveal="up"
                style="
                  font-size: var(--text-eyebrow);
                  letter-spacing: 0.14em;
                  text-transform: uppercase;
                  color: var(--text-tertiary);
                  margin-bottom: 20px;
                "
              >
                How it works
              </div>
              <h2
                data-reveal="up"
                style="
                  margin: 0 0 56px;
                  font-family: var(--font-display);
                  font-weight: 400;
                  font-size: var(--text-display-2);
                  line-height: 1.08;
                  letter-spacing: -0.02em;
                "
              >
                Step by Step Working Process
              </h2>
              <div
                style="
                  display: grid;
                  grid-template-columns: repeat(
                    auto-fit,
                    minmax(min(100%, 260px), 1fr)
                  );
                  gap: 24px;
                "
              >
                <sc-for list="{{ process }}" as="st" hint-placeholder-count="4">
                  <div
                    data-reveal="up"
                    data-delay="{{ st.delay }}"
                    style="display: flex; flex-direction: column; gap: 16px"
                  >
                    <div
                      style="
                        aspect-ratio: 1/1;
                        border-radius: 8px;
                        overflow: hidden;
                        background: var(--ink-05);
                      "
                    >
                      <img
                        src="{{ st.img }}"
                        alt="{{ st.title }}"
                        style="
                          width: 100%;
                          height: 100%;
                          object-fit: cover;
                          transition: transform 900ms
                            cubic-bezier(0.2, 0.7, 0.2, 1);
                        "
                        style-hover="transform:scale(1.05)"
                      />
                    </div>
                    <span
                      style="
                        font-family: var(--font-mono);
                        font-size: var(--text-caption);
                        color: var(--accent-hover);
                      "
                      >{{ st.num }}</span
                    >
                    <h3
                      style="
                        margin: 0;
                        font-family: var(--font-display);
                        font-weight: 500;
                        font-size: var(--text-h3);
                        letter-spacing: -0.01em;
                      "
                    >
                      {{ st.title }}
                    </h3>
                    <p
                      style="
                        margin: 0;
                        font-size: var(--text-body-sm);
                        line-height: 1.6;
                        color: var(--text-secondary);
                      "
                    >
                      {{ st.text }}
                    </p>
                  </div>
                </sc-for>
              </div>
            </section>

            <section
              style="
                border-top: 1px solid var(--border-default);
                padding: clamp(80px, 11vw, 160px) 0;
              "
            >
              <div
                style="
                  max-width: 1360px;
                  margin: 0 auto;
                  padding: 0 clamp(20px, 5vw, 64px);
                "
              >
                <div
                  data-reveal="up"
                  style="
                    font-size: var(--text-eyebrow);
                    letter-spacing: 0.14em;
                    text-transform: uppercase;
                    color: var(--text-tertiary);
                    margin-bottom: 20px;
                  "
                >
                  Our Testimonials
                </div>
                <h2
                  data-reveal="up"
                  style="
                    margin: 0 0 56px;
                    max-width: 820px;
                    font-family: var(--font-display);
                    font-weight: 400;
                    font-size: var(--text-display-2);
                    line-height: 1.08;
                    letter-spacing: -0.02em;
                    text-wrap: balance;
                  "
                >
                  What Our Customers Say About Our Services
                </h2>
                <div
                  style="
                    display: grid;
                    grid-template-columns: repeat(
                      auto-fit,
                      minmax(min(100%, 460px), 1fr)
                    );
                    gap: 1px;
                    background: var(--border-default);
                    border: 1px solid var(--border-default);
                  "
                >
                  <sc-for
                    list="{{ testimonials }}"
                    as="t"
                    hint-placeholder-count="4"
                  >
                    <figure
                      data-reveal="up"
                      data-delay="{{ t.delay }}"
                      style="
                        margin: 0;
                        background: var(--paper);
                        padding: clamp(28px, 4vw, 48px);
                        display: flex;
                        flex-direction: column;
                        justify-content: space-between;
                        gap: 32px;
                      "
                    >
                      <blockquote
                        style="
                          margin: 0;
                          font-family: var(--font-display);
                          font-size: clamp(1.375rem, 2.2vw, 1.75rem);
                          line-height: 1.3;
                          letter-spacing: -0.01em;
                          text-wrap: pretty;
                        "
                      >
                        “{{ t.quote }}”
                      </blockquote>
                      <figcaption
                        style="display: flex; align-items: center; gap: 14px"
                      >
                        <img
                          src="{{ t.img }}"
                          alt="{{ t.name }}"
                          style="
                            width: 44px;
                            height: 44px;
                            border-radius: 999px;
                            object-fit: cover;
                            background: var(--ink-10);
                          "
                        />
                        <span style="display: flex; flex-direction: column"
                          ><strong
                            style="
                              font-weight: 600;
                              font-size: var(--text-body-sm);
                            "
                            >{{ t.name }}</strong
                          ><span
                            style="
                              font-size: var(--text-caption);
                              color: var(--text-tertiary);
                            "
                            >{{ t.role }}</span
                          ></span
                        >
                      </figcaption>
                    </figure>
                  </sc-for>
                </div>
              </div>
            </section>

            <section
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: 0 clamp(20px, 5vw, 64px) clamp(80px, 11vw, 160px);
              "
            >
              <div
                style="
                  display: flex;
                  justify-content: space-between;
                  align-items: end;
                  gap: 24px;
                  flex-wrap: wrap;
                  margin-bottom: 48px;
                "
              >
                <div>
                  <div
                    data-reveal="up"
                    style="
                      font-size: var(--text-eyebrow);
                      letter-spacing: 0.14em;
                      text-transform: uppercase;
                      color: var(--text-tertiary);
                      margin-bottom: 20px;
                    "
                  >
                    Blog &amp; News
                  </div>
                  <h2
                    data-reveal="up"
                    style="
                      margin: 0;
                      font-family: var(--font-display);
                      font-weight: 400;
                      font-size: var(--text-display-2);
                      line-height: 1.08;
                      letter-spacing: -0.02em;
                    "
                  >
                    Explore Latest Insights
                  </h2>
                </div>
                <div data-reveal="up">
                  <x-import
                    component-from-global-scope="UniversalDesignSystem_25b065.Button"
                    variant="secondary"
                    on-click="{{ goBlog }}"
                    hint-size="150px,48px"
                    >Read the blog</x-import
                  >
                </div>
              </div>
              <div
                style="
                  display: grid;
                  grid-template-columns: repeat(
                    auto-fit,
                    minmax(min(100%, 320px), 1fr)
                  );
                  gap: 32px;
                "
              >
                <sc-for list="{{ posts }}" as="b" hint-placeholder-count="3">
                  <a
                    href="#"
                    data-reveal="up"
                    data-delay="{{ b.delay }}"
                    onClick="{{ goBlog }}"
                    style="
                      display: flex;
                      flex-direction: column;
                      gap: 16px;
                      color: var(--ink);
                    "
                  >
                    <div
                      style="
                        aspect-ratio: 16/10;
                        border-radius: 8px;
                        overflow: hidden;
                        background: var(--ink-05);
                      "
                    >
                      <img
                        src="{{ b.img }}"
                        alt="{{ b.title }}"
                        style="
                          width: 100%;
                          height: 100%;
                          object-fit: cover;
                          transition: transform 900ms
                            cubic-bezier(0.2, 0.7, 0.2, 1);
                        "
                        style-hover="transform:scale(1.05)"
                      />
                    </div>
                    <span
                      style="
                        font-family: var(--font-mono);
                        font-size: var(--text-caption);
                        color: var(--text-tertiary);
                      "
                      >{{ b.date }}</span
                    >
                    <h3
                      style="
                        margin: 0;
                        font-family: var(--font-display);
                        font-weight: 500;
                        font-size: var(--text-h3);
                        line-height: 1.25;
                        letter-spacing: -0.01em;
                        text-wrap: balance;
                      "
                    >
                      {{ b.title }}
                    </h3>
                  </a>
                </sc-for>
              </div>
            </section>
          </sc-if>

          <!-- ================= WORK ================= -->
          <sc-if value="{{ isWork }}" hint-placeholder-val="{{ false }}">
            <section
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: clamp(56px, 9vw, 128px) clamp(20px, 5vw, 64px)
                  clamp(48px, 6vw, 80px);
              "
            >
              <div
                data-reveal="up"
                style="
                  font-size: var(--text-eyebrow);
                  letter-spacing: 0.14em;
                  text-transform: uppercase;
                  color: var(--text-tertiary);
                  margin-bottom: 28px;
                "
              >
                Popular Works
              </div>
              <h1
                style="
                  margin: 0;
                  font-family: var(--font-display);
                  font-weight: 400;
                  font-size: clamp(3rem, 8vw, 7.5rem);
                  line-height: 1;
                  letter-spacing: -0.035em;
                "
              >
                <span
                  style="
                    display: block;
                    overflow: hidden;
                    padding-bottom: 0.06em;
                  "
                  ><span data-reveal="line" style="display: block"
                    >Explore Our</span
                  ></span
                >
                <span
                  style="
                    display: block;
                    overflow: hidden;
                    padding-bottom: 0.06em;
                  "
                  ><span
                    data-reveal="line"
                    data-delay="90"
                    style="display: block"
                    >Latest <em style="color: var(--accent)">Projects</em></span
                  ></span
                >
              </h1>
            </section>
            <section
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: 0 clamp(20px, 5vw, 64px) clamp(80px, 11vw, 160px);
                display: grid;
                grid-template-columns: repeat(
                  auto-fit,
                  minmax(min(100%, 520px), 1fr)
                );
                gap: clamp(40px, 5vw, 64px) 32px;
              "
            >
              <sc-for list="{{ projects }}" as="p" hint-placeholder-count="4">
                <article
                  style="display:flex;flex-direction:column;gap:20px;padding-top:{{ p.offset }}"
                >
                  <div
                    data-reveal="img"
                    style="
                      position: relative;
                      overflow: hidden;
                      border-radius: 8px;
                      aspect-ratio: 4/5;
                      background: var(--ink-05);
                    "
                  >
                    <img
                      data-parallax="0.1"
                      src="{{ p.img }}"
                      alt="{{ p.title }}"
                      style="
                        position: absolute;
                        left: 0;
                        top: -10%;
                        width: 100%;
                        height: 120%;
                        object-fit: cover;
                      "
                    />
                  </div>
                  <div
                    data-reveal="up"
                    style="display: flex; flex-direction: column; gap: 12px"
                  >
                    <div style="display: flex; flex-wrap: wrap; gap: 6px">
                      <sc-for
                        list="{{ p.tags }}"
                        as="tg"
                        hint-placeholder-count="3"
                      >
                        <x-import
                          component-from-global-scope="UniversalDesignSystem_25b065.Tag"
                          hint-size="90px,26px"
                          >{{ tg }}</x-import
                        >
                      </sc-for>
                    </div>
                    <h2
                      style="
                        margin: 0;
                        font-family: var(--font-display);
                        font-weight: 400;
                        font-size: clamp(1.75rem, 3vw, 2.5rem);
                        line-height: 1.1;
                        letter-spacing: -0.02em;
                      "
                    >
                      {{ p.title }}
                    </h2>
                  </div>
                </article>
              </sc-for>
            </section>
          </sc-if>

          <!-- ================= SERVICES ================= -->
          <sc-if value="{{ isServices }}" hint-placeholder-val="{{ false }}">
            <section
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: clamp(56px, 9vw, 128px) clamp(20px, 5vw, 64px)
                  clamp(48px, 6vw, 80px);
              "
            >
              <div
                data-reveal="up"
                style="
                  font-size: var(--text-eyebrow);
                  letter-spacing: 0.14em;
                  text-transform: uppercase;
                  color: var(--text-tertiary);
                  margin-bottom: 28px;
                "
              >
                Services
              </div>
              <h1
                style="
                  margin: 0;
                  font-family: var(--font-display);
                  font-weight: 400;
                  font-size: clamp(3rem, 8vw, 7.5rem);
                  line-height: 1;
                  letter-spacing: -0.035em;
                "
              >
                <span
                  style="
                    display: block;
                    overflow: hidden;
                    padding-bottom: 0.06em;
                  "
                  ><span data-reveal="line" style="display: block"
                    >Services That Turn</span
                  ></span
                >
                <span
                  style="
                    display: block;
                    overflow: hidden;
                    padding-bottom: 0.06em;
                  "
                  ><span
                    data-reveal="line"
                    data-delay="90"
                    style="display: block"
                    >Your Vision Into
                    <em style="color: var(--accent)">Reality</em></span
                  ></span
                >
              </h1>
            </section>
            <section
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: 0 clamp(20px, 5vw, 64px) clamp(64px, 8vw, 120px);
              "
            >
              <div
                style="
                  display: grid;
                  grid-template-columns: repeat(
                    auto-fit,
                    minmax(min(100%, 420px), 1fr)
                  );
                  gap: clamp(32px, 5vw, 80px);
                  border-top: 1px solid var(--border-default);
                  padding-top: 48px;
                "
              >
                <div>
                  <h2
                    data-reveal="up"
                    style="
                      margin: 0 0 20px;
                      font-family: var(--font-display);
                      font-weight: 400;
                      font-size: var(--text-h1);
                      letter-spacing: -0.02em;
                    "
                  >
                    About the Service
                  </h2>
                  <p
                    data-reveal="up"
                    style="
                      margin: 0;
                      font-size: var(--text-body-lg);
                      line-height: 1.6;
                      color: var(--text-secondary);
                      text-wrap: pretty;
                    "
                  >
                    We partner with startups, scale-ups, and agencies for design
                    consulting, audits, and new design systems. Our
                    collaborative process and quick turnarounds make visual
                    storytelling sharper and results measurable.
                  </p>
                </div>
                <div>
                  <h3
                    data-reveal="up"
                    style="
                      margin: 0 0 20px;
                      font-size: var(--text-eyebrow);
                      letter-spacing: 0.14em;
                      text-transform: uppercase;
                      color: var(--text-tertiary);
                      font-weight: 500;
                    "
                  >
                    Service Specialty
                  </h3>
                  <sc-for
                    list="{{ specialty }}"
                    as="sp"
                    hint-placeholder-count="4"
                  >
                    <div
                      data-reveal="up"
                      style="
                        padding: 16px 0;
                        border-bottom: 1px solid var(--border-subtle);
                        font-size: var(--text-body);
                        display: flex;
                        gap: 16px;
                      "
                    >
                      <span style="color: var(--accent)">—</span>{{ sp }}
                    </div>
                  </sc-for>
                </div>
              </div>
            </section>
            <sc-for list="{{ services }}" as="s" hint-placeholder-count="2">
              <section
                style="
                  max-width: 1360px;
                  margin: 0 auto;
                  padding: clamp(48px, 6vw, 96px) clamp(20px, 5vw, 64px);
                  border-top: 1px solid var(--border-default);
                "
              >
                <div
                  style="
                    display: grid;
                    grid-template-columns: repeat(
                      auto-fit,
                      minmax(min(100%, 440px), 1fr)
                    );
                    gap: clamp(32px, 5vw, 80px);
                    align-items: start;
                  "
                >
                  <div
                    data-reveal="img"
                    style="position:relative;overflow:hidden;border-radius:8px;aspect-ratio:5/4;background:var(--ink-05);order:{{ s.order }}"
                  >
                    <img
                      data-parallax="0.1"
                      src="{{ s.pageImg }}"
                      alt="{{ s.title }}"
                      style="
                        position: absolute;
                        left: 0;
                        top: -10%;
                        width: 100%;
                        height: 120%;
                        object-fit: cover;
                      "
                    />
                  </div>
                  <div style="display: flex; flex-direction: column; gap: 24px">
                    <span
                      data-reveal="up"
                      style="
                        font-family: var(--font-mono);
                        font-size: var(--text-caption);
                        color: var(--accent-hover);
                      "
                      >{{ s.num }}</span
                    >
                    <h2
                      data-reveal="up"
                      style="
                        margin: 0;
                        font-family: var(--font-display);
                        font-weight: 400;
                        font-size: var(--text-display-2);
                        line-height: 1.08;
                        letter-spacing: -0.02em;
                      "
                    >
                      {{ s.title }}
                    </h2>
                    <p
                      data-reveal="up"
                      style="
                        margin: 0;
                        font-size: var(--text-body);
                        line-height: 1.6;
                        color: var(--text-secondary);
                        text-wrap: pretty;
                      "
                    >
                      {{ s.desc }}
                    </p>
                    <div
                      data-reveal="up"
                      style="display: flex; flex-direction: column; gap: 8px"
                    >
                      <sc-for
                        list="{{ s.bullets }}"
                        as="bl"
                        hint-placeholder-count="3"
                      >
                        <div
                          style="
                            display: flex;
                            gap: 12px;
                            font-size: var(--text-body-sm);
                          "
                        >
                          <span style="color: var(--accent)">—</span>{{ bl }}
                        </div>
                      </sc-for>
                    </div>
                    <div
                      style="
                        display: grid;
                        grid-template-columns: repeat(
                          auto-fit,
                          minmax(min(100%, 220px), 1fr)
                        );
                        gap: 1px;
                        background: var(--border-subtle);
                        border: 1px solid var(--border-subtle);
                        border-radius: 4px;
                        overflow: hidden;
                        margin-top: 8px;
                      "
                    >
                      <sc-for
                        list="{{ s.subs }}"
                        as="sb"
                        hint-placeholder-count="4"
                      >
                        <div
                          data-reveal="up"
                          style="
                            background: var(--paper);
                            padding: 20px;
                            display: flex;
                            flex-direction: column;
                            gap: 6px;
                          "
                        >
                          <strong
                            style="
                              font-weight: 600;
                              font-size: var(--text-body-sm);
                            "
                            >{{ sb.t }}</strong
                          >
                          <span
                            style="
                              font-size: var(--text-body-sm);
                              line-height: 1.5;
                              color: var(--text-secondary);
                            "
                            >{{ sb.d }}</span
                          >
                        </div>
                      </sc-for>
                    </div>
                  </div>
                </div>
              </section>
            </sc-for>
            <section
              style="
                background: var(--surface-sunken);
                padding: clamp(80px, 11vw, 160px) 0;
              "
            >
              <div
                style="
                  max-width: 1360px;
                  margin: 0 auto;
                  padding: 0 clamp(20px, 5vw, 64px);
                "
              >
                <div
                  data-reveal="up"
                  style="
                    font-size: var(--text-eyebrow);
                    letter-spacing: 0.14em;
                    text-transform: uppercase;
                    color: var(--text-tertiary);
                    margin-bottom: 20px;
                  "
                >
                  Pricing Package
                </div>
                <h2
                  data-reveal="up"
                  style="
                    margin: 0 0 56px;
                    max-width: 860px;
                    font-family: var(--font-display);
                    font-weight: 400;
                    font-size: var(--text-display-2);
                    line-height: 1.08;
                    letter-spacing: -0.02em;
                    text-wrap: balance;
                  "
                >
                  Premium Web Design Services Without the Premium Price
                </h2>
                <div
                  style="
                    display: grid;
                    grid-template-columns: repeat(
                      auto-fit,
                      minmax(min(100%, 420px), 1fr)
                    );
                    gap: 24px;
                  "
                >
                  <sc-for
                    list="{{ packages }}"
                    as="pk"
                    hint-placeholder-count="2"
                  >
                    <div
                      data-reveal="up"
                      data-delay="{{ pk.delay }}"
                      style="background:{{ pk.bg }};color:{{ pk.fg }};border:1px solid var(--border-default);border-radius:8px;padding:clamp(28px,4vw,48px);display:flex;flex-direction:column;gap:24px"
                    >
                      <div>
                        <h3
                          style="
                            margin: 0 0 8px;
                            font-family: var(--font-display);
                            font-weight: 500;
                            font-size: var(--text-h1);
                            letter-spacing: -0.02em;
                          "
                        >
                          {{ pk.name }}
                        </h3>
                        <p
                          style="
                            margin: 0;
                            font-size: var(--text-body-sm);
                            opacity: 0.75;
                          "
                        >
                          {{ pk.sub }}
                        </p>
                      </div>
                      <div
                        style="display:flex;flex-direction:column;gap:10px;border-top:1px solid {{ pk.rule }};padding-top:24px"
                      >
                        <span
                          style="
                            font-size: var(--text-eyebrow);
                            letter-spacing: 0.14em;
                            text-transform: uppercase;
                            opacity: 0.6;
                          "
                          >Includes</span
                        >
                        <sc-for
                          list="{{ pk.includes }}"
                          as="i"
                          hint-placeholder-count="5"
                          ><div
                            style="
                              display: flex;
                              gap: 12px;
                              font-size: var(--text-body-sm);
                            "
                          >
                            <span style="color: var(--accent)">—</span>{{ i }}
                          </div></sc-for
                        >
                      </div>
                      <div
                        style="display:flex;flex-direction:column;gap:10px;border-top:1px solid {{ pk.rule }};padding-top:24px"
                      >
                        <span
                          style="
                            font-size: var(--text-eyebrow);
                            letter-spacing: 0.14em;
                            text-transform: uppercase;
                            opacity: 0.6;
                          "
                          >Extras</span
                        >
                        <sc-for
                          list="{{ pk.extras }}"
                          as="e"
                          hint-placeholder-count="3"
                          ><div
                            style="
                              display: flex;
                              gap: 12px;
                              font-size: var(--text-body-sm);
                            "
                          >
                            <span style="color: var(--accent)">—</span>{{ e }}
                          </div></sc-for
                        >
                      </div>
                      <div
                        style="
                          margin-top: auto;
                          display: flex;
                          align-items: center;
                          gap: 16px;
                          flex-wrap: wrap;
                        "
                      >
                        <x-import
                          component-from-global-scope="UniversalDesignSystem_25b065.Button"
                          variant="accent"
                          on-click="{{ goContact }}"
                          hint-size="170px,48px"
                          >Choose Package</x-import
                        >
                        <span
                          style="font-size: var(--text-caption); opacity: 0.6"
                          >No credit card required</span
                        >
                      </div>
                    </div>
                  </sc-for>
                </div>
              </div>
            </section>
          </sc-if>

          <!-- ================= STUDIO ================= -->
          <sc-if value="{{ isStudio }}" hint-placeholder-val="{{ false }}">
            <section
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: clamp(56px, 9vw, 128px) clamp(20px, 5vw, 64px) 48px;
              "
            >
              <div
                data-reveal="up"
                style="
                  font-size: var(--text-eyebrow);
                  letter-spacing: 0.14em;
                  text-transform: uppercase;
                  color: var(--text-tertiary);
                  margin-bottom: 28px;
                "
              >
                Our Studio
              </div>
              <h1
                style="
                  margin: 0;
                  font-family: var(--font-display);
                  font-weight: 400;
                  font-size: clamp(3.5rem, 12vw, 11rem);
                  line-height: 0.95;
                  letter-spacing: -0.04em;
                "
              >
                <span
                  style="
                    display: block;
                    overflow: hidden;
                    padding-bottom: 0.06em;
                  "
                  ><span data-reveal="line" style="display: block"
                    >Briefffly
                    <em style="color: var(--accent)">Studio</em></span
                  ></span
                >
              </h1>
            </section>
            <div
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: 0 clamp(20px, 5vw, 64px);
              "
            >
              <div
                data-reveal="img"
                style="
                  position: relative;
                  overflow: hidden;
                  border-radius: 8px;
                  aspect-ratio: 16/7;
                  background: var(--ink-05);
                "
              >
                <img
                  data-parallax="0.12"
                  src="https://briefffly.studio/assets/images/our-studio/our-studio-banner.png"
                  alt="Briefffly studio"
                  style="
                    position: absolute;
                    left: 0;
                    top: -10%;
                    width: 100%;
                    height: 120%;
                    object-fit: cover;
                  "
                />
              </div>
            </div>
            <section
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: clamp(80px, 11vw, 160px) clamp(20px, 5vw, 64px);
              "
            >
              <div
                style="
                  display: grid;
                  grid-template-columns: repeat(
                    auto-fit,
                    minmax(min(100%, 420px), 1fr)
                  );
                  gap: clamp(40px, 6vw, 96px);
                "
              >
                <div>
                  <div
                    data-reveal="up"
                    style="
                      font-size: var(--text-eyebrow);
                      letter-spacing: 0.14em;
                      text-transform: uppercase;
                      color: var(--text-tertiary);
                      margin-bottom: 20px;
                    "
                  >
                    About Agency
                  </div>
                  <h2
                    data-reveal="up"
                    style="
                      margin: 0;
                      font-family: var(--font-display);
                      font-weight: 400;
                      font-size: var(--text-display-2);
                      line-height: 1.08;
                      letter-spacing: -0.02em;
                      text-wrap: balance;
                    "
                  >
                    Transforming Ideas Into Designs That Inspire &amp; Connect
                  </h2>
                </div>
                <div style="display: flex; flex-direction: column; gap: 24px">
                  <p
                    data-reveal="up"
                    style="
                      margin: 0;
                      font-size: var(--text-body-lg);
                      line-height: 1.6;
                      color: var(--text-secondary);
                      text-wrap: pretty;
                    "
                  >
                    At Briefffly Design Studio, we blend creativity and strategy
                    to craft designs that not only look stunning but also
                    deliver real impact. From sleek websites to engaging mobile
                    applications, our work helps brands stand out in the digital
                    landscape.
                  </p>
                  <p
                    data-reveal="up"
                    style="
                      margin: 0;
                      font-size: var(--text-body);
                      line-height: 1.6;
                      color: var(--text-secondary);
                      text-wrap: pretty;
                    "
                  >
                    Our team of passionate designers and developers is dedicated
                    to turning your vision into powerful digital experiences
                    that resonate with your audience.
                  </p>
                </div>
              </div>
            </section>
            <section
              style="
                background: var(--surface-inverse);
                color: var(--text-on-inverse);
                padding: clamp(80px, 11vw, 160px) 0;
              "
            >
              <div
                style="
                  max-width: 1360px;
                  margin: 0 auto;
                  padding: 0 clamp(20px, 5vw, 64px);
                "
              >
                <div
                  data-reveal="up"
                  style="
                    font-size: var(--text-eyebrow);
                    letter-spacing: 0.14em;
                    text-transform: uppercase;
                    color: var(--ink-45);
                    margin-bottom: 20px;
                  "
                >
                  Our Way, Simplified
                </div>
                <h2
                  data-reveal="up"
                  style="
                    margin: 0 0 64px;
                    max-width: 980px;
                    font-family: var(--font-display);
                    font-weight: 400;
                    font-size: var(--text-h1);
                    line-height: 1.25;
                    letter-spacing: -0.01em;
                    text-wrap: pretty;
                  "
                >
                  We believe great results come from a clear, focused process —
                  from shaping bold ideas to scaling impactful solutions.
                </h2>
                <div
                  style="
                    display: grid;
                    grid-template-columns: repeat(
                      auto-fit,
                      minmax(min(100%, 300px), 1fr)
                    );
                    gap: 48px;
                  "
                >
                  <sc-for
                    list="{{ studioSteps }}"
                    as="w"
                    hint-placeholder-count="3"
                  >
                    <div
                      data-reveal="up"
                      data-delay="{{ w.delay }}"
                      style="
                        border-top: 1px solid var(--ink-70);
                        padding-top: 24px;
                        display: flex;
                        flex-direction: column;
                        gap: 16px;
                      "
                    >
                      <span
                        style="
                          font-family: var(--font-mono);
                          font-size: var(--text-caption);
                          color: var(--accent-light);
                        "
                        >{{ w.num }}</span
                      >
                      <h3
                        style="
                          margin: 0;
                          font-family: var(--font-display);
                          font-weight: 400;
                          font-size: var(--text-h1);
                          letter-spacing: -0.02em;
                        "
                      >
                        {{ w.title }}
                      </h3>
                      <p
                        style="
                          margin: 0;
                          font-size: var(--text-body-sm);
                          line-height: 1.6;
                          color: var(--ink-20);
                        "
                      >
                        {{ w.text }}
                      </p>
                    </div>
                  </sc-for>
                </div>
              </div>
            </section>
            <section
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: clamp(80px, 11vw, 160px) clamp(20px, 5vw, 64px);
              "
            >
              <div
                data-reveal="up"
                style="
                  font-size: var(--text-eyebrow);
                  letter-spacing: 0.14em;
                  text-transform: uppercase;
                  color: var(--text-tertiary);
                  margin-bottom: 20px;
                "
              >
                Meet Our Team
              </div>
              <h2
                data-reveal="up"
                style="
                  margin: 0 0 48px;
                  font-family: var(--font-display);
                  font-weight: 400;
                  font-size: var(--text-display-2);
                  line-height: 1.08;
                  letter-spacing: -0.02em;
                "
              >
                Meet Our Experience Team Memeber
              </h2>
              <div
                style="
                  display: grid;
                  grid-template-columns: repeat(
                    auto-fit,
                    minmax(min(100%, 280px), 1fr)
                  );
                  column-gap: 48px;
                  border-top: 1px solid var(--border-default);
                "
              >
                <sc-for list="{{ team }}" as="m" hint-placeholder-count="8">
                  <div
                    data-reveal="up"
                    style="
                      display: flex;
                      justify-content: space-between;
                      align-items: baseline;
                      gap: 16px;
                      padding: 22px 0;
                      border-bottom: 1px solid var(--border-default);
                    "
                  >
                    <span
                      style="
                        font-family: var(--font-display);
                        font-size: var(--text-h3);
                      "
                      >{{ m.name }}</span
                    >
                    <span
                      style="
                        font-size: var(--text-caption);
                        color: var(--text-tertiary);
                        text-align: right;
                      "
                      >{{ m.role }}</span
                    >
                  </div>
                </sc-for>
              </div>
            </section>
            <section
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: 0 clamp(20px, 5vw, 64px) clamp(80px, 11vw, 160px);
              "
            >
              <div
                data-reveal="up"
                style="
                  font-size: var(--text-eyebrow);
                  letter-spacing: 0.14em;
                  text-transform: uppercase;
                  color: var(--text-tertiary);
                  margin-bottom: 20px;
                "
              >
                How we work
              </div>
              <h2
                data-reveal="up"
                style="
                  margin: 0 0 48px;
                  font-family: var(--font-display);
                  font-weight: 400;
                  font-size: var(--text-display-2);
                  line-height: 1.08;
                  letter-spacing: -0.02em;
                "
              >
                How we work
              </h2>
              <div style="border-top: 1px solid var(--border-default)">
                <sc-for
                  list="{{ howWeWork }}"
                  as="h"
                  hint-placeholder-count="5"
                >
                  <div
                    data-reveal="up"
                    style="
                      display: grid;
                      grid-template-columns: 56px minmax(0, 1fr) minmax(
                          0,
                          1.3fr
                        );
                      gap: 24px;
                      padding: 28px 0;
                      border-bottom: 1px solid var(--border-default);
                      align-items: baseline;
                    "
                  >
                    <span
                      style="
                        font-family: var(--font-mono);
                        font-size: var(--text-caption);
                        color: var(--accent-hover);
                      "
                      >{{ h.num }}</span
                    >
                    <h3
                      style="
                        margin: 0;
                        font-family: var(--font-display);
                        font-weight: 400;
                        font-size: var(--text-h2);
                        letter-spacing: -0.01em;
                      "
                    >
                      {{ h.title }}
                    </h3>
                    <p
                      style="
                        margin: 0;
                        font-size: var(--text-body-sm);
                        line-height: 1.6;
                        color: var(--text-secondary);
                      "
                    >
                      {{ h.text }}
                    </p>
                  </div>
                </sc-for>
              </div>
            </section>
            <!-- <div
              style="
                border-top: 1px solid var(--border-default);
                border-bottom: 1px solid var(--border-default);
                padding: 24px 0;
                overflow: hidden;
              "
            >
              <div
                data-marquee="1"
                data-speed="0.7"
                style="display: flex; width: max-content"
              >
                <sc-for
                  list="{{ marqueeServices }}"
                  as="m"
                  hint-placeholder-count="6"
                >
                  <span
                    style="
                      display: flex;
                      align-items: center;
                      gap: 32px;
                      padding-right: 32px;
                      font-size: clamp(1.25rem, 2.4vw, 1.75rem);
                      font-weight: 500;
                      white-space: nowrap;
                    "
                    >{{ m }}<span
                      style="
                        width: 8px;
                        height: 8px;
                        border-radius: 999px;
                        background: var(--accent);
                        display: block;
                      "
                    ></span
                  ></span>
                </sc-for>
              </div>
            </div> -->

            <section style="max-width:1360px;margin:0 auto;padding:clamp(64px,8vw,112px) clamp(20px,5vw,64px)">
              <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(32px,6vw,80px);align-items:start">

                <div>
                  <div data-reveal="up" style="font-size:var(--text-eyebrow);letter-spacing:0.14em;text-transform:uppercase;color:var(--text-tertiary);margin-bottom:20px">Visit Us</div>

                  <h2 data-reveal="up" style="margin:0;font-family:var(--font-display);font-weight:400;font-size:var(--text-display-2);line-height:1.08;letter-spacing:-0.02em">Find Our Studio in Ahmedabad</h2>
                </div>

                <div data-reveal="up" style="display:flex;flex-direction:column;align-items:flex-start;gap:20px">
                  <div style="font-size:var(--text-eyebrow);letter-spacing:0.14em;text-transform:uppercase;color:var(--text-tertiary)">Office Address</div>

                  <p style="margin:0;font-size:var(--text-body-lg);line-height:1.8;color:var(--text-secondary)">
                    612, J. B. Tower,<br>
                    Drive In Road,<br>
                    Near Doordarshan Kendra / S.A.L. Hospital,<br>
                    Thaltej, Ahmedabad,<br>
                    Gujarat 380054, India
                  </p>

                  <a
                    href="https://www.google.com/maps/search/?api=1&amp;query=612%2C%20J.%20B.%20Tower%2C%20Drive%20In%20Road%2C%20Near%20Doordarshan%20Kendra%20%2F%20S.A.L.%20Hospital%2C%20Thaltej%2C%20Ahmedabad%2C%20Gujarat%20380054%2C%20India"
                    target="_blank"
                    rel="noopener noreferrer"
                    style="display:inline-flex;align-items:center;gap:8px;font-size:var(--text-body-sm);font-weight:600;color:var(--accent-hover);text-decoration:none;border-bottom:1px solid var(--accent-hover);padding-bottom:6px"
                  >View Studio Location on Google Maps ↗</a>
                </div>

              </div>
            </section>

            <div style="border-top:1px solid var(--border-default);border-bottom:1px solid var(--border-default);padding:24px 0;overflow:hidden">
              <div data-marquee="1" data-speed="0.7" style="display:flex;width:max-content">
                <sc-for list="{{ marqueeServices }}" as="m" hint-placeholder-count="6">
                  <span style="display:flex;align-items:center;gap:32px;padding-right:32px;font-size:clamp(1.25rem,2.4vw,1.75rem);font-weight:500;white-space:nowrap">{{ m }}<span style="width:8px;height:8px;border-radius:999px;background:var(--accent);display:block"></span></span>
                </sc-for>
              </div>
            </div>

          </sc-if>

          <!-- ================= BLOG ================= -->
          <sc-if value="{{ isBlog }}" hint-placeholder-val="{{ false }}">
            <section
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: clamp(56px, 9vw, 128px) clamp(20px, 5vw, 64px)
                  clamp(48px, 6vw, 80px);
              "
            >
              <div
                data-reveal="up"
                style="
                  font-size: var(--text-eyebrow);
                  letter-spacing: 0.14em;
                  text-transform: uppercase;
                  color: var(--text-tertiary);
                  margin-bottom: 28px;
                "
              >
                Blog &amp; News
              </div>
              <h1
                style="
                  margin: 0;
                  font-family: var(--font-display);
                  font-weight: 400;
                  font-size: clamp(3rem, 8vw, 7.5rem);
                  line-height: 1;
                  letter-spacing: -0.035em;
                "
              >
                <span
                  style="
                    display: block;
                    overflow: hidden;
                    padding-bottom: 0.06em;
                  "
                  ><span data-reveal="line" style="display: block"
                    >Explore Latest
                    <em style="color: var(--accent)">Insights</em></span
                  ></span
                >
              </h1>
            </section>
            <section
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: 0 clamp(20px, 5vw, 64px) clamp(80px, 11vw, 160px);
              "
            >
              <sc-for list="{{ posts }}" as="b" hint-placeholder-count="3">
                <a
                  href="#"
                  data-reveal="up"
                  style="
                    display: grid;
                    grid-template-columns: repeat(
                      auto-fit,
                      minmax(min(100%, 380px), 1fr)
                    );
                    gap: clamp(24px, 4vw, 64px);
                    padding: 40px 0;
                    border-top: 1px solid var(--border-default);
                    color: var(--ink);
                    align-items: center;
                  "
                >
                  <div
                    style="
                      aspect-ratio: 16/10;
                      border-radius: 8px;
                      overflow: hidden;
                      background: var(--ink-05);
                    "
                  >
                    <img
                      src="{{ b.img }}"
                      alt="{{ b.title }}"
                      style="
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                        transition: transform 900ms
                          cubic-bezier(0.2, 0.7, 0.2, 1);
                      "
                      style-hover="transform:scale(1.05)"
                    />
                  </div>
                  <div style="display: flex; flex-direction: column; gap: 16px">
                    <span
                      style="
                        font-family: var(--font-mono);
                        font-size: var(--text-caption);
                        color: var(--text-tertiary);
                      "
                      >{{ b.date }}</span
                    >
                    <h2
                      style="
                        margin: 0;
                        font-family: var(--font-display);
                        font-weight: 400;
                        font-size: var(--text-h1);
                        line-height: 1.15;
                        letter-spacing: -0.02em;
                        text-wrap: balance;
                      "
                    >
                      {{ b.title }}
                    </h2>
                    <p
                      style="
                        margin: 0;
                        font-size: var(--text-body);
                        line-height: 1.6;
                        color: var(--text-secondary);
                        text-wrap: pretty;
                      "
                    >
                      {{ b.excerpt }}
                    </p>
                    <span
                      style="
                        font-size: var(--text-body-sm);
                        font-weight: 600;
                        color: var(--accent-hover);
                      "
                      >Read the article →</span
                    >
                  </div>
                </a>
              </sc-for>
            </section>
          </sc-if>

          <!-- ================= CONTACT ================= -->
          <sc-if value="{{ isContact }}" hint-placeholder-val="{{ false }}">
            <section
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: clamp(56px, 9vw, 128px) clamp(20px, 5vw, 64px)
                  clamp(48px, 6vw, 80px);
              "
            >
              <div
                data-reveal="up"
                style="
                  font-size: var(--text-eyebrow);
                  letter-spacing: 0.14em;
                  text-transform: uppercase;
                  color: var(--text-tertiary);
                  margin-bottom: 28px;
                "
              >
                Contact Information
              </div>
              <h1
                style="
                  margin: 0;
                  font-family: var(--font-display);
                  font-weight: 400;
                  font-size: clamp(3.5rem, 12vw, 11rem);
                  line-height: 0.95;
                  letter-spacing: -0.04em;
                "
              >
                <span
                  style="
                    display: block;
                    overflow: hidden;
                    padding-bottom: 0.06em;
                  "
                  ><span data-reveal="line" style="display: block"
                    >Contact <em style="color: var(--accent)">Us</em></span
                  ></span
                >
              </h1>
            </section>
            <section
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: 0 clamp(20px, 5vw, 64px) clamp(80px, 11vw, 160px);
              "
            >
              <!-- <div
                style="
                  display: grid;
                  grid-template-columns: repeat(
                    auto-fit,
                    minmax(min(100%, 420px), 1fr)
                  );
                  gap: clamp(40px, 6vw, 96px);
                  border-top: 1px solid var(--border-default);
                  padding-top: 56px;
                "
              >
                <div style="display: flex; flex-direction: column; gap: 32px">
                  <h2
                    data-reveal="up"
                    style="
                      margin: 0;
                      font-family: var(--font-display);
                      font-weight: 400;
                      font-size: var(--text-display-2);
                      line-height: 1.08;
                      letter-spacing: -0.02em;
                    "
                  >
                    Get In Touch With Our Team
                  </h2>
                  <div
                    data-reveal="up"
                    style="display: flex; flex-direction: column; gap: 8px"
                  >
                    <span
                      style="
                        font-size: var(--text-eyebrow);
                        letter-spacing: 0.14em;
                        text-transform: uppercase;
                        color: var(--text-tertiary);
                      "
                      >Email Address</span
                    >
                    <a
                      href="mailto:sales@briefffly.com"
                      style="
                        font-family: var(--font-display);
                        font-size: var(--text-h1);
                        letter-spacing: -0.02em;
                      "
                      >sales@briefffly.com</a
                    >
                  </div>
                  <div
                    data-reveal="img"
                    style="
                      position: relative;
                      overflow: hidden;
                      border-radius: 8px;
                      aspect-ratio: 4/3;
                      background: var(--ink-05);
                    "
                  >
                    <img
                      data-parallax="0.1"
                      src="https://briefffly.studio/assets/images/our-studio/our-studio-banner.png"
                      alt="Briefffly studio"
                      style="
                        position: absolute;
                        left: 0;
                        top: -10%;
                        width: 100%;
                        height: 120%;
                        object-fit: cover;
                      "
                    />
                  </div>
                </div> -->
                <div style="display:flex;flex-direction:column;gap:32px">
                  <h2 data-reveal="up" style="margin:0;font-family:var(--font-display);font-weight:400;font-size:var(--text-display-2);line-height:1.08;letter-spacing:-0.02em">Get In Touch With Our Team</h2>

                  <div data-reveal="up" style="display:flex;flex-direction:column;gap:8px">
                    <span style="font-size:var(--text-eyebrow);letter-spacing:0.14em;text-transform:uppercase;color:var(--text-tertiary)">Email Address</span>
                    <a href="mailto:sales@briefffly.com" style="font-family:var(--font-display);font-size:var(--text-h1);letter-spacing:-0.02em">sales@briefffly.com</a>
                  </div>

                  <div data-reveal="up" style="display:flex;flex-direction:column;gap:12px">
                    <span style="font-size:var(--text-eyebrow);letter-spacing:0.14em;text-transform:uppercase;color:var(--text-tertiary)">Office Address</span>

                    <p style="margin:0;font-size:var(--text-body-lg);line-height:1.7;color:var(--text-secondary)">
                      612, J. B. Tower,<br>
                      Drive In Road,<br>
                      Near Doordarshan Kendra / S.A.L. Hospital,<br>
                      Thaltej, Ahmedabad,<br>
                      Gujarat 380054, India
                    </p>

                    <div>
                      <a
                        href="https://www.google.com/maps/search/?api=1&amp;query=612%2C%20J.%20B.%20Tower%2C%20Drive%20In%20Road%2C%20Near%20Doordarshan%20Kendra%20%2F%20S.A.L.%20Hospital%2C%20Thaltej%2C%20Ahmedabad%2C%20Gujarat%20380054%2C%20India"
                        target="_blank"
                        rel="noopener noreferrer"
                        style="font-size:var(--text-body-lg);font-weight:600;color:var(--accent-hover);text-decoration:none"
                      >Visit Us on Google Maps ↗</a>
                    </div>
                  </div>

                  <div data-reveal="img" style="position:relative;overflow:hidden;border-radius:8px;aspect-ratio:4/3;background:var(--ink-05)">
                    <img data-parallax="0.1" src="https://briefffly.studio/assets/images/our-studio/our-studio-banner.png" alt="Briefffly studio" style="position:absolute;left:0;top:-10%;width:100%;height:120%;object-fit:cover">
                  </div>
                </div>                
                <div
                  data-reveal="up"
                  style="display: flex; flex-direction: column; gap: 20px"
                >
                  <div
                    style="
                      font-size: var(--text-eyebrow);
                      letter-spacing: 0.14em;
                      text-transform: uppercase;
                      color: var(--text-tertiary);
                    "
                  >
                    Send Message
                  </div>
                  <h2
                    style="
                      margin: 0 0 8px;
                      font-family: var(--font-display);
                      font-weight: 400;
                      font-size: var(--text-h1);
                      letter-spacing: -0.02em;
                    "
                  >
                    Ready to Work Together
                  </h2>
                  <sc-if
                    value="{{ formSent }}"
                    hint-placeholder-val="{{ false }}"
                  >
                    <div
                      style="
                        padding: 24px;
                        border-radius: 4px;
                        background: var(--success-tint);
                        color: var(--success);
                        font-weight: 500;
                      "
                    >
                      Thank you! Your message has been sent successfully.
                    </div>
                  </sc-if>
                  <sc-if
                    value="{{ formOpen }}"
                    hint-placeholder-val="{{ true }}"
                  >
                    <div
                      style="
                        display: grid;
                        grid-template-columns: repeat(
                          auto-fit,
                          minmax(min(100%, 200px), 1fr)
                        );
                        gap: 16px;
                      "
                    >
                      <x-import
                        component-from-global-scope="UniversalDesignSystem_25b065.Input"
                        label="Name"
                        placeholder="Your name"
                        value="{{ name }}"
                        on-change="{{ onName }}"
                        hint-size="100%,70px"
                      ></x-import>

                      <x-import
                        component-from-global-scope="UniversalDesignSystem_25b065.Input"
                        label="Email"
                        type="email"
                        placeholder="you@company.com"
                        value="{{ email }}"
                        on-change="{{ onEmail }}"
                        hint-size="100%,70px"
                      ></x-import>
                    </div>
                    <x-import
                      component-from-global-scope="UniversalDesignSystem_25b065.Select"
                      label="Subject"
                      options="{{ subjects }}"
                      value="{{ subject }}"
                      on-change="{{ onSubject }}"
                      hint-size="100%,70px"
                    ></x-import>

                    <x-import
                      component-from-global-scope="UniversalDesignSystem_25b065.Textarea"
                      label="Message"
                      placeholder="Tell us about your brief"
                      value="{{ message }}"
                      on-change="{{ onMessage }}"
                      hint-size="100%,140px"
                    ></x-import>
                    <div>
                      <x-import
                        component-from-global-scope="UniversalDesignSystem_25b065.Button"
                        size="lg"
                        on-click="{{ sendForm }}"
                        hint-size="180px,56px"
                        >Send Message</x-import
                      >
                    </div>
                  </sc-if>
                </div>
              </div>
            </section>
          </sc-if>

          <!-- ================= GLOBAL CTA + FOOTER ================= -->
          <section
            style="
              background: var(--surface-inverse);
              color: var(--text-on-inverse);
              padding: clamp(80px, 11vw, 160px) 0 0;
              overflow: hidden;
            "
          >
            <div
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: 0 clamp(20px, 5vw, 64px);
              "
            >
              <h2
                data-reveal="up"
                style="
                  margin: 0;
                  max-width: 1100px;
                  font-family: var(--font-display);
                  font-weight: 400;
                  font-size: var(--text-display-2);
                  line-height: 1.08;
                  letter-spacing: -0.02em;
                  text-wrap: balance;
                "
              >
                Have an Idea? Let’s Turn Your Vision Into Designs That Inspire
                and Deliver Results
              </h2>
              <div
                style="
                  display: flex;
                  justify-content: space-between;
                  align-items: end;
                  gap: 32px;
                  flex-wrap: wrap;
                  margin-top: 40px;
                "
              >
                <p
                  data-reveal="up"
                  style="
                    margin: 0;
                    max-width: 520px;
                    font-size: var(--text-body-lg);
                    line-height: 1.6;
                    color: var(--ink-20);
                  "
                >
                  Let’s bring it to life with designs that inspire and deliver
                  results. Connect with us today and start your creative
                  journey.
                </p>
                <div
                  data-reveal="up"
                  style="display: flex; gap: 12px; flex-wrap: wrap"
                >
                  <x-import
                    component-from-global-scope="UniversalDesignSystem_25b065.Button"
                    variant="accent"
                    size="lg"
                    on-click="{{ goContact }}"
                    hint-size="150px,56px"
                    >Contact Us</x-import
                  >
                  <a
                    href="#"
                    onClick="{{ goWork }}"
                    style="
                      display: inline-flex;
                      align-items: center;
                      padding: 16px 32px;
                      border: 1px solid var(--ink-70);
                      border-radius: 4px;
                      color: var(--paper);
                      font-weight: 600;
                      font-size: var(--text-body-lg);
                      transition: background 120ms;
                    "
                    style-hover="background:#000;color:var(--paper)"
                    >See Our Work</a
                  >
                </div>
              </div>
            </div>
            <a
              href="#"
              onClick="{{ goContact }}"
              style="
                display: block;
                margin-top: clamp(64px, 8vw, 120px);
                border-top: 1px solid var(--ink-70);
                border-bottom: 1px solid var(--ink-70);
                padding: clamp(20px, 3vw, 36px) 0;
                overflow: hidden;
                color: var(--paper);
              "
              style-hover="color:var(--accent-light)"
            >
              <div
                data-marquee="1"
                data-speed="1.4"
                data-dir="-1"
                style="display: flex; width: max-content"
              >
                <sc-for list="{{ marqueeB }}" as="m" hint-placeholder-count="6">
                  <span
                    style="
                      display: flex;
                      align-items: center;
                      gap: 40px;
                      padding-right: 40px;
                      font-family: var(--font-display);
                      font-style: italic;
                      font-size: clamp(3rem, 9vw, 8rem);
                      line-height: 1;
                      letter-spacing: -0.03em;
                      white-space: nowrap;
                    "
                    >{{ m }}<span
                      style="font-style: normal; color: var(--accent)"
                      >✱</span
                    ></span
                  >
                </sc-for>
              </div>
            </a>
            <footer
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: 64px clamp(20px, 5vw, 64px) 40px;
                display: grid;
                grid-template-columns: repeat(
                  auto-fit,
                  minmax(min(100%, 220px), 1fr)
                );
                gap: 40px;
              "
            >
              <div style="display: flex; flex-direction: column; gap: 16px">
                <span
                  style="
                    font-family: var(--font-display);
                    font-size: 30px;
                    font-weight: 600;
                    letter-spacing: -0.02em;
                  "
                  >Briefffly</span
                >
                <p
                  style="
                    margin: 0;
                    font-size: var(--text-body-sm);
                    line-height: 1.6;
                    color: var(--ink-20);
                    max-width: 260px;
                  "
                >
                  Where your brief becomes a brand story worth sharing.
                </p>
              </div>
              <div style="display: flex; flex-direction: column; gap: 10px">
                <span
                  style="
                    font-size: var(--text-eyebrow);
                    letter-spacing: 0.14em;
                    text-transform: uppercase;
                    color: var(--ink-45);
                    margin-bottom: 6px;
                  "
                  >Pages</span
                >
                <sc-for list="{{ navItems }}" as="n" hint-placeholder-count="5">
                  <a
                    href="#"
                    onClick="{{ n.onClick }}"
                    style="color: var(--ink-10); font-size: var(--text-body-sm)"
                    style-hover="color:var(--accent-light)"
                    >{{ n.label }}</a
                  >
                </sc-for>
              </div>
              <!-- <div style="display: flex; flex-direction: column; gap: 10px">
                <span
                  style="
                    font-size: var(--text-eyebrow);
                    letter-spacing: 0.14em;
                    text-transform: uppercase;
                    color: var(--ink-45);
                    margin-bottom: 6px;
                  "
                  >Contact Us</span
                >
                <a
                  href="mailto:sales@briefffly.com"
                  style="color: var(--ink-10); font-size: var(--text-body-sm)"
                  style-hover="color:var(--accent-light)"
                  >sales@briefffly.com</a
                >
              </div> -->
              <div style="display:flex;flex-direction:column;gap:10px">
                <span style="font-size:var(--text-eyebrow);letter-spacing:0.14em;text-transform:uppercase;color:var(--ink-45);margin-bottom:6px">Contact Us</span>

                <a href="mailto:sales@briefffly.com" style="color:var(--ink-10);font-size:var(--text-body-sm)" style-hover="color:var(--accent-light)">sales@briefffly.com</a>

                <span style="font-size:var(--text-eyebrow);letter-spacing:0.14em;text-transform:uppercase;color:var(--ink-45);margin-top:12px">Office Address</span>

                <p style="margin:0;color:var(--ink-20);font-size:var(--text-body-sm);line-height:1.7">
                  612, J. B. Tower,<br>
                  Drive In Road,<br>
                  Near Doordarshan Kendra / S.A.L. Hospital,<br>
                  Thaltej, Ahmedabad,<br>
                  Gujarat 380054, India
                </p>

                <a
                  href="https://www.google.com/maps/search/?api=1&amp;query=612%2C%20J.%20B.%20Tower%2C%20Drive%20In%20Road%2C%20Near%20Doordarshan%20Kendra%20%2F%20S.A.L.%20Hospital%2C%20Thaltej%2C%20Ahmedabad%2C%20Gujarat%20380054%2C%20India"
                  target="_blank"
                  rel="noopener noreferrer"
                  style="color:var(--accent-light);font-size:var(--text-body-sm);font-weight:600;text-decoration:none"
                >View on Google Maps ↗</a>
              </div>
              <div style="display: flex; flex-direction: column; gap: 10px">
                <span
                  style="
                    font-size: var(--text-eyebrow);
                    letter-spacing: 0.14em;
                    text-transform: uppercase;
                    color: var(--ink-45);
                    margin-bottom: 6px;
                  "
                  >Follow Us</span
                >
                <a
                  href="https://x.com/brieffflystudio"
                  target="_blank"
                  style="color: var(--ink-10); font-size: var(--text-body-sm)"
                  style-hover="color:var(--accent-light)"
                  >X / Twitter</a
                >
                <a
                  href="https://www.instagram.com/briefffly.studio"
                  target="_blank"
                  style="color: var(--ink-10); font-size: var(--text-body-sm)"
                  style-hover="color:var(--accent-light)"
                  >Instagram</a
                >
                <a
                  href="https://www.linkedin.com/company/briefffly/"
                  target="_blank"
                  style="color: var(--ink-10); font-size: var(--text-body-sm)"
                  style-hover="color:var(--accent-light)"
                  >LinkedIn</a
                >
              </div>
            </footer>
            <div
              style="
                max-width: 1360px;
                margin: 0 auto;
                padding: 24px clamp(20px, 5vw, 64px) 32px;
                border-top: 1px solid var(--ink-70);
                font-size: var(--text-caption);
                color: var(--ink-45);
              "
            >
              Copyright © Briefffly, all rights reserved.
            </div>
          </section>
        </main>

        <!-- hover preview -->
        <div
          ref="{{ previewRef }}"
          style="
            position: fixed;
            left: 0;
            top: 0;
            width: 300px;
            height: 380px;
            pointer-events: none;
            z-index: 40;
            will-change: transform;
          "
        >
          <div
            style="width:100%;height:100%;border-radius:8px;overflow:hidden;position:relative;transition:opacity 300ms cubic-bezier(.4,0,.2,1),transform 400ms cubic-bezier(.2,.7,.2,1);opacity:{{ previewOpacity }};transform:scale({{ previewScale }});box-shadow:var(--shadow-lg)"
          >
            <sc-for list="{{ projects }}" as="p" hint-placeholder-count="1">
              <img
                src="{{ p.img }}"
                alt=""
                style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;transition:opacity 300ms;opacity:{{ p.previewOpacity }}"
              />
            </sc-for>
          </div>
        </div>

        <!-- page transition curtain -->
        <div
          ref="{{ curtainRef }}"
          style="
            position: fixed;
            inset: 0;
            z-index: 100;
            background: var(--ink);
            transform: translateY(100%);
            pointer-events: none;
            display: flex;
            align-items: center;
            justify-content: center;
          "
        >
          <span
            ref="{{ curtainLabelRef }}"
            style="
              font-family: var(--font-display);
              font-style: italic;
              font-size: clamp(2.5rem, 7vw, 6rem);
              color: var(--paper);
              letter-spacing: -0.03em;
            "
          ></span>
        </div>
      </div>
    </x-dc>
@endverbatim
<script
      type="text/x-dc"
      data-dc-script
      data-props='{"smoothScroll":{"editor":"boolean","default":true,"tsType":"boolean","section":"Motion"},"motion":{"editor":"enum","options":["subtle","standard","expressive"],"default":"standard","tsType":"string","section":"Motion"},"marqueeSpeed":{"editor":"range","min":0,"max":3,"step":0.1,"default":1,"tsType":"number","section":"Motion"}}'
    >
{!! file_get_contents(public_path('js/pages/briefffly-v1.js')) !!}
</script>
@endsection
