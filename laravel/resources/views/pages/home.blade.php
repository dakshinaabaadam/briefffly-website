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
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link
          rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@700;800;900&display=swap"
        />
        <script src="/js/ds/_ds_bundle.js"></script>
        <link rel="stylesheet" href="/css/briefffly-v2.css" />
      </helmet>

      <div
        style="
          font-family: var(--font-body);
          background: #f3f0ea;
          color: #141210;
          min-height: 100vh;
          overflow-x: clip;
        "
      >
        <!-- NAV -->
        <header
          style="position:fixed;top:0;left:0;right:0;z-index:60;transition:background 300ms,border-color 300ms;background:{{ navBg }};backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border-bottom:1px solid {{ navBorder }}"
        >
          <div
            style="
              max-width: none;
              margin: 0 auto;
              padding: 0 clamp(20px, 4vw, 56px);
              height: 68px;
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
                font-family: &quot;Big Shoulders Display&quot;, sans-serif;
                font-weight: 900;
                font-size: 30px;
                letter-spacing: 0.01em;
                text-transform: uppercase;
                color: #141210;
                display: flex;
                align-items: center;
                gap: 8px;
              "
              ><span
                style="
                  width: 12px;
                  height: 12px;
                  background: #141210;
                  display: block;
                  transform: rotate(45deg);
                "
              ></span
              >Briefffly</a
            >
            <div style="display: flex; align-items: center; gap: 10px">
              <a
                href="#"
                onClick="{{ goContact }}"
                style="
                  display: flex;
                  align-items: center;
                  flex: none;
                  white-space: nowrap;
                  height: 42px;
                  padding: 0 20px;
                  border-radius: 999px;
                  background: #141210;
                  color: #f3f0ea;
                  font-size: var(--text-body-sm);
                  font-weight: 600;
                  transition: background 150ms;
                "
                style-hover="background:#ff4d1f;color:#141210"
                >Start Projects</a
              >
              <button
                onClick="{{ toggleMenu }}"
                aria-label="Menu"
                style="
                  flex: none;
                  white-space: nowrap;
                  height: 42px;
                  padding: 0 18px;
                  border-radius: 999px;
                  border: 1.5px solid #141210;
                  background: transparent;
                  color: #141210;
                  font-family: var(--font-body);
                  font-weight: 700;
                  font-size: var(--text-body-sm);
                  cursor: pointer;
                  display: flex;
                  align-items: center;
                  gap: 10px;
                "
              >
                <span style="display: flex; flex-direction: column; gap: 4px"
                  ><span
                    style="
                      width: 16px;
                      height: 2px;
                      background: #141210;
                      display: block;
                    "
                  ></span
                  ><span
                    style="
                      width: 16px;
                      height: 2px;
                      background: #141210;
                      display: block;
                    "
                  ></span></span
                >Menu
              </button>
            </div>
          </div>
        </header>

        <!-- FULLSCREEN MENU -->
        <div
          style="position:fixed;inset:0;z-index:80;background:#141210;color:#f3f0ea;transition:clip-path 700ms cubic-bezier(.7,0,.2,1);clip-path:{{ menuClip }};display:flex;flex-direction:column"
        >
          <div
            style="
              max-width: none;
              width: 100%;
              margin: 0 auto;
              padding: 0 clamp(20px, 4vw, 56px);
              height: 68px;
              display: flex;
              align-items: center;
              justify-content: space-between;
            "
          >
            <span
              style="
                font-family: &quot;Big Shoulders Display&quot;, sans-serif;
                font-weight: 900;
                font-size: 30px;
                text-transform: uppercase;
                color: #ff4d1f;
              "
              >Briefffly</span
            >
            <button
              onClick="{{ toggleMenu }}"
              aria-label="Close"
              style="
                width: 48px;
                height: 48px;
                border-radius: 999px;
                border: 1.5px solid #f3f0ea;
                background: transparent;
                color: #f3f0ea;
                font-size: 22px;
                cursor: pointer;
              "
            >
              ✕
            </button>
          </div>
          <nav
            style="
              flex: 1;
              max-width: none;
              width: 100%;
              margin: 0 auto;
              padding: clamp(24px, 4vw, 56px) clamp(20px, 4vw, 56px);
              display: flex;
              flex-direction: column;
              justify-content: center;
            "
          >
            <sc-for list="{{ menuItems }}" as="n" hint-placeholder-count="6">
              <div style="overflow: hidden; border-bottom: 1px solid #2c2925">
                <a
                  href="#"
                  onClick="{{ n.onClick }}"
                  style="display:flex;align-items:baseline;justify-content:space-between;gap:24px;padding:6px 0;font-family:'Big Shoulders Display',sans-serif;font-weight:900;text-transform:uppercase;font-size:clamp(3rem,9vw,7.5rem);line-height:0.95;color:{{ n.color }};transition:transform 700ms cubic-bezier(.2,.7,.2,1) {{ n.delay }}, color 150ms;transform:translateY({{ menuItemY }})"
                  style-hover="color:#ff4d1f"
                  >{{ n.label }}<span
                    style="
                      font-family: var(--font-mono);
                      font-weight: 400;
                      font-size: var(--text-caption);
                      color: #8a857b;
                    "
                    >{{ n.num }}</span
                  ></a
                >
              </div>
            </sc-for>
          </nav>
          <div
            style="
              max-width: none;
              width: 100%;
              margin: 0 auto;
              padding: 24px clamp(20px, 4vw, 56px);
              display: flex;
              justify-content: space-between;
              flex-wrap: wrap;
              gap: 16px;
              font-size: var(--text-body-sm);
              color: #d8d4cc;
            "
          >
            <a href="mailto:sales@briefffly.com">sales@briefffly.com</a>
            <span style="display: flex; gap: 20px"
              ><a href="https://x.com/brieffflystudio" target="_blank">X</a
              ><a
                href="https://www.instagram.com/briefffly.studio"
                target="_blank"
                >Instagram</a
              ><a
                href="https://www.linkedin.com/company/briefffly/"
                target="_blank"
                >LinkedIn</a
              ></span
            >
          </div>
        </div>

        <main style="padding-top: 0">
          <!-- ================= HOME ================= -->
          <sc-if value="{{ isHome }}" hint-placeholder-val="{{ true }}">
            <section
              style="
                background: #ff4d1f;
                color: #141210;
                padding: 132px 0 0;
                position: relative;
                overflow: hidden;
              "
            >
              <div
                style="
                  max-width: none;
                  margin: 0 auto;
                  padding: 0 clamp(20px, 4vw, 56px);
                "
              >
                <div
                  style="
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    gap: 16px;
                    flex-wrap: wrap;
                    font-size: var(--text-body-sm);
                    font-weight: 600;
                  "
                >
                  <span
                    data-reveal="up"
                    style="
                      display: flex;
                      align-items: center;
                      gap: 10px;
                      white-space: nowrap;
                    "
                    ><span
                      style="
                        flex: none;
                        width: 8px;
                        height: 8px;
                        border-radius: 999px;
                        background: #141210;
                        display: block;
                      "
                    ></span
                    >Web Design Agency</span
                  >
                  <span
                    data-reveal="up"
                    style="
                      font-family: var(--font-mono);
                      font-weight: 400;
                      font-size: var(--text-caption);
                    "
                    >Brand identities / UI/UX / Digital visuals</span
                  >
                </div>
                <h1
                  style="
                    margin: clamp(24px, 4vw, 48px) 0 0;
                    font-family: &quot;Big Shoulders Display&quot;, sans-serif;
                    font-weight: 900;
                    text-transform: uppercase;
                    font-size: clamp(4.5rem, 17vw, 17rem);
                    line-height: 0.82;
                    letter-spacing: -0.01em;
                  "
                >
                  <span style="display: block; overflow: hidden"
                    ><span data-reveal="line" style="display: block"
                      >Bold Design.</span
                    ></span
                  >
                  <span
                    style="
                      display: flex;
                      overflow: hidden;
                      align-items: flex-end;
                      gap: 0.15em;
                      position: relative;
                    "
                    ><span
                      data-reveal="line"
                      data-delay="100"
                      style="display: block"
                      >Delivered</span
                    ></span
                  >
                  <span
                    style="display: block; overflow: hidden; text-align: right"
                    ><span
                      data-reveal="line"
                      data-delay="200"
                      style="display: block; color: #f3f0ea"
                      >Briefffly</span
                    ></span
                  >
                </h1>
              </div>
              <div
                style="
                  max-width: none;
                  margin: 0 auto;
                  padding: clamp(32px, 4vw, 56px) clamp(20px, 4vw, 56px) 0;
                  display: grid;
                  grid-template-columns: repeat(
                    auto-fit,
                    minmax(min(100%, 360px), 1fr)
                  );
                  gap: 32px;
                  align-items: end;
                "
              >
                <div
                  style="
                    display: flex;
                    flex-direction: column;
                    gap: 28px;
                    padding-bottom: clamp(32px, 4vw, 56px);
                  "
                >
                  <p
                    data-reveal="up"
                    data-delay="300"
                    style="
                      margin: 0;
                      max-width: 440px;
                      font-size: var(--text-body-lg);
                      line-height: 1.5;
                      font-weight: 500;
                      text-wrap: pretty;
                    "
                  >
                    We transform quick briefs into stunning
                    <strong style="font-weight: 800"
                      >brand identities, UI/UX designs</strong
                    >, and digital visuals that speak for your brand — fast,
                    functional, and unforgettable.
                  </p>
                  <div data-reveal="up" data-delay="400">
                    <a
                      href="#"
                      onClick="{{ goWork }}"
                      style="
                        display: inline-flex;
                        align-items: center;
                        gap: 14px;
                        height: 56px;
                        padding: 0 8px 0 26px;
                        border-radius: 999px;
                        background: #141210;
                        color: #f3f0ea;
                        font-weight: 700;
                        transition: background 150ms;
                      "
                      style-hover="background:#f3f0ea;color:#141210"
                      >Explore Our Projects<span
                        style="
                          width: 40px;
                          height: 40px;
                          border-radius: 999px;
                          background: #dcff4f;
                          color: #141210;
                          display: flex;
                          align-items: center;
                          justify-content: center;
                          font-size: 18px;
                        "
                        >↗</span
                      ></a
                    >
                  </div>
                </div>
                <div
                  data-reveal="img"
                  style="
                    position: relative;
                    overflow: hidden;
                    border-radius: 12px 12px 0 0;
                    aspect-ratio: 4/3;
                    background: #e2431a;
                  "
                >
                  <img
                    data-parallax="0.14"
                    src="https://briefffly.studio/assets/images/homepage/Hero.png"
                    alt="Briefffly work"
                    style="
                      position: absolute;
                      left: 0;
                      top: -12%;
                      width: 100%;
                      height: 124%;
                      object-fit: cover;
                    "
                  />
                  <span
                    style="
                      position: absolute;
                      top: 20px;
                      left: 20px;
                      background: #dcff4f;
                      color: #141210;
                      font-family: var(--font-mono);
                      font-size: var(--text-caption);
                      font-weight: 500;
                      padding: 6px 12px;
                      border-radius: 999px;
                      transform: rotate(-6deg);
                    "
                    >Fast, functional, unforgettable</span
                  >
                </div>
              </div>
            </section>

            <div
              style="
                background: #141210;
                color: #dcff4f;
                padding: 22px 0;
                overflow: hidden;
                transform: rotate(-1.5deg) scale(1.04);
                margin: -12px 0 0;
                position: relative;
                z-index: 2;
              "
            >
              <div
                data-marquee="1"
                data-speed="1.2"
                style="display: flex; width: max-content"
              >
                <sc-for list="{{ marqueeA }}" as="m" hint-placeholder-count="8">
                  <span
                    style="
                      display: flex;
                      align-items: center;
                      gap: 32px;
                      padding-right: 32px;
                      font-family:
                        &quot;Big Shoulders Display&quot;, sans-serif;
                      font-weight: 800;
                      text-transform: uppercase;
                      font-size: clamp(2rem, 4vw, 3.25rem);
                      line-height: 1;
                      white-space: nowrap;
                    "
                    >{{ m }}<span style="color: #ff4d1f">✶</span></span
                  >
                </sc-for>
              </div>
            </div>

            <section
              data-about="1"
              style="position: relative; height: 340vh; background: #f3f0ea"
            >
              <div
                style="
                  position: sticky;
                  top: 0;
                  height: 100vh;
                  overflow: hidden;
                "
              >
                <div
                  data-aimgwrap="1"
                  style="
                    position: absolute;
                    inset: 0;
                    clip-path: inset(50% 50% 50% 50% round 28px);
                    z-index: 1;
                    background: #141210;
                  "
                >
                  <img
                    data-aimg="1"
                    src="https://briefffly.studio/assets/images/homepage/About-1.png"
                    alt="Briefffly studio work"
                    style="
                      position: absolute;
                      inset: 0;
                      width: 100%;
                      height: 100%;
                      object-fit: cover;
                    "
                  />
                  <div
                    style="
                      position: absolute;
                      inset: 0;
                      background: linear-gradient(
                        180deg,
                        rgba(20, 18, 16, 0) 40%,
                        rgba(20, 18, 16, 0.45) 100%
                      );
                    "
                  ></div>
                </div>
                <div
                  data-atext="1"
                  style="
                    position: absolute;
                    inset: 0;
                    z-index: 2;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    padding: 88px clamp(20px, 4vw, 56px) 40px;
                    pointer-events: none;
                  "
                >
                  <p
                    data-awords="1"
                    style="
                      margin: 0;
                      max-width: 1180px;
                      text-align: center;
                      font-family:
                        &quot;Big Shoulders Display&quot;, sans-serif;
                      font-weight: 900;
                      text-transform: uppercase;
                      font-size: clamp(2.75rem, min(8vw, 13vh), 8rem);
                      line-height: 0.92;
                      text-wrap: balance;
                    "
                  >
                    <sc-for
                      list="{{ aboutWords }}"
                      as="w"
                      hint-placeholder-count="10"
                      ><span style="opacity: 0.14">{{ w }} </span></sc-for
                    >
                  </p>
                </div>
                <span
                  data-achip="1"
                  data-x="6"
                  data-y="20"
                  style="position: absolute; left: 6%; top: 20%; z-index: 3"
                  ><span
                    style="
                      display: block;
                      background: #dcff4f;
                      color: #141210;
                      font-family:
                        &quot;Big Shoulders Display&quot;, sans-serif;
                      font-weight: 800;
                      text-transform: uppercase;
                      font-size: clamp(1.1rem, 2vw, 1.6rem);
                      padding: 8px 16px;
                      border-radius: 999px;
                      white-space: nowrap;
                      transform: rotate(-8deg);
                      box-shadow: 0 10px 24px rgba(20, 18, 16, 0.12);
                    "
                    >Web Design</span
                  ></span
                >
                <span
                  data-achip="1"
                  data-x="74"
                  data-y="16"
                  style="position: absolute; left: 74%; top: 16%; z-index: 3"
                  ><span
                    style="
                      display: block;
                      background: #ff4d1f;
                      color: #141210;
                      font-family:
                        &quot;Big Shoulders Display&quot;, sans-serif;
                      font-weight: 800;
                      text-transform: uppercase;
                      font-size: clamp(1.1rem, 2vw, 1.6rem);
                      padding: 8px 16px;
                      border-radius: 999px;
                      white-space: nowrap;
                      transform: rotate(6deg);
                      box-shadow: 0 10px 24px rgba(20, 18, 16, 0.12);
                    "
                    >Branding</span
                  ></span
                >
                <span
                  data-achip="1"
                  data-x="3"
                  data-y="74"
                  style="position: absolute; left: 3%; top: 74%; z-index: 3"
                  ><span
                    style="
                      display: block;
                      background: #141210;
                      color: #f3f0ea;
                      font-family:
                        &quot;Big Shoulders Display&quot;, sans-serif;
                      font-weight: 800;
                      text-transform: uppercase;
                      font-size: clamp(1.1rem, 2vw, 1.6rem);
                      padding: 8px 16px;
                      border-radius: 999px;
                      white-space: nowrap;
                      transform: rotate(5deg);
                      box-shadow: 0 10px 24px rgba(20, 18, 16, 0.12);
                    "
                    >Mobile App Design</span
                  ></span
                >
                <span
                  data-achip="1"
                  data-x="76"
                  data-y="76"
                  style="position: absolute; left: 76%; top: 76%; z-index: 3"
                  ><span
                    style="
                      display: block;
                      background: #fbfaf8;
                      color: #141210;
                      font-family:
                        &quot;Big Shoulders Display&quot;, sans-serif;
                      font-weight: 800;
                      text-transform: uppercase;
                      font-size: clamp(1.1rem, 2vw, 1.6rem);
                      padding: 8px 16px;
                      border-radius: 999px;
                      white-space: nowrap;
                      transform: rotate(-6deg);
                      box-shadow: 0 10px 24px rgba(20, 18, 16, 0.12);
                    "
                    >Social Creatives</span
                  ></span
                >
                <span
                  data-achip="1"
                  data-x="42"
                  data-y="86"
                  style="position: absolute; left: 42%; top: 86%; z-index: 3"
                  ><span
                    style="
                      display: block;
                      background: #ff4d1f;
                      color: #141210;
                      font-family:
                        &quot;Big Shoulders Display&quot;, sans-serif;
                      font-weight: 800;
                      text-transform: uppercase;
                      font-size: clamp(1.1rem, 2vw, 1.6rem);
                      padding: 8px 16px;
                      border-radius: 999px;
                      white-space: nowrap;
                      transform: rotate(-3deg);
                      box-shadow: 0 10px 24px rgba(20, 18, 16, 0.12);
                    "
                    >3D Animation</span
                  ></span
                >
                <div
                  style="
                    position: absolute;
                    left: clamp(20px, 4vw, 56px);
                    top: 88px;
                    z-index: 4;
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    font-size: var(--text-body-sm);
                    font-weight: 700;
                    white-space: nowrap;
                  "
                >
                  <span
                    style="
                      flex: none;
                      width: 8px;
                      height: 8px;
                      border-radius: 999px;
                      background: #ff4d1f;
                      display: block;
                    "
                  ></span
                  ><span data-alabel="1">About Agency</span>
                </div>
                <div
                  style="
                    position: absolute;
                    right: clamp(16px, 2vw, 28px);
                    top: 50%;
                    margin-top: -80px;
                    width: 3px;
                    height: 160px;
                    border-radius: 3px;
                    background: rgba(20, 18, 16, 0.12);
                    z-index: 4;
                    overflow: hidden;
                  "
                >
                  <div
                    data-abar="1"
                    style="
                      width: 100%;
                      height: 100%;
                      background: #ff4d1f;
                      transform-origin: top;
                      transform: scaleY(0);
                    "
                  ></div>
                </div>
                <div
                  data-apanel="1"
                  style="
                    position: absolute;
                    z-index: 5;
                    left: clamp(12px, 4vw, 56px);
                    bottom: clamp(12px, 3vw, 40px);
                    width: min(600px, calc(100% - 24px));
                    max-height: calc(100vh - 120px);
                    overflow: auto;
                    background: #f3f0ea;
                    border-radius: 22px;
                    padding: clamp(20px, 2.6vw, 32px);
                    display: flex;
                    flex-direction: column;
                    gap: 14px;
                    transform: translateY(120%);
                  "
                >
                  <h2
                    style="
                      margin: 0;
                      font-family:
                        &quot;Big Shoulders Display&quot;, sans-serif;
                      font-weight: 900;
                      text-transform: uppercase;
                      font-size: clamp(1.75rem, 3vw, 2.5rem);
                      line-height: 0.95;
                    "
                  >
                    Transforming Ideas Into Designs That Inspire &amp; Connect
                  </h2>
                  <p
                    style="
                      margin: 0;
                      font-size: var(--text-body-sm);
                      line-height: 1.6;
                      color: #4a463f;
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
                    style="
                      margin: 0;
                      font-size: var(--text-body-sm);
                      line-height: 1.6;
                      color: #4a463f;
                      text-wrap: pretty;
                    "
                  >
                    Our team of passionate designers and developers is dedicated
                    to turning your vision into powerful digital experiences
                    that resonate with your audience.
                  </p>
                  <div style="display: flex; flex-wrap: wrap; gap: 6px">
                    <sc-for
                      list="{{ disciplines }}"
                      as="d"
                      hint-placeholder-count="5"
                      ><span
                        data-atag="1"
                        style="
                          font-size: 12px;
                          font-weight: 700;
                          padding: 6px 12px;
                          border-radius: 999px;
                          background: #141210;
                          color: #f3f0ea;
                          white-space: nowrap;
                        "
                        >{{ d.name }}</span
                      ></sc-for
                    >
                  </div>
                  <a
                    href="#"
                    onClick="{{ goStudio }}"
                    style="
                      align-self: flex-start;
                      display: inline-flex;
                      align-items: center;
                      gap: 12px;
                      height: 48px;
                      padding: 0 6px 0 20px;
                      border-radius: 999px;
                      background: #ff4d1f;
                      color: #141210;
                      font-weight: 700;
                      font-size: var(--text-body-sm);
                      white-space: nowrap;
                    "
                    style-hover="background:#141210;color:#f3f0ea"
                    >Meet Our Studio<span
                      style="
                        width: 36px;
                        height: 36px;
                        border-radius: 999px;
                        background: #141210;
                        color: #dcff4f;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                      "
                      >↗</span
                    ></a
                  >
                </div>
              </div>
            </section>

            <section
              data-stack="1"
              style="
                position: relative;
                height: 420vh;
                background: #141210;
                color: #f3f0ea;
              "
            >
              <div
                style="
                  position: sticky;
                  top: 0;
                  height: 100vh;
                  overflow: hidden;
                "
              >
                <div
                  style="
                    position: absolute;
                    left: 0;
                    right: 0;
                    top: 0;
                    height: clamp(150px, 30vh, 260px);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    pointer-events: none;
                    overflow: hidden;
                  "
                >
                  <span
                    data-sbig="1"
                    style="
                      font-family:
                        &quot;Big Shoulders Display&quot;, sans-serif;
                      font-weight: 900;
                      text-transform: uppercase;
                      font-size: clamp(6rem, 24vw, 22rem);
                      line-height: 0.8;
                      color: #2c2925;
                      white-space: nowrap;
                      will-change: transform;
                    "
                    >Latest Projects · Latest Projects</span
                  >
                </div>
                <div
                  style="
                    position: absolute;
                    z-index: 20;
                    left: clamp(16px, 4vw, 56px);
                    right: clamp(16px, 4vw, 56px);
                    top: 80px;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    gap: 16px;
                  "
                >
                  <span
                    style="
                      display: flex;
                      align-items: center;
                      gap: 10px;
                      font-size: var(--text-body-sm);
                      font-weight: 700;
                      white-space: nowrap;
                    "
                    ><span
                      style="
                        flex: none;
                        width: 8px;
                        height: 8px;
                        border-radius: 999px;
                        background: #ff4d1f;
                        display: block;
                      "
                    ></span
                    >Popular Works</span
                  >
                  <span style="display: flex; align-items: center; gap: 14px">
                    <span
                      data-scount="1"
                      style="
                        font-family:
                          &quot;Big Shoulders Display&quot;, sans-serif;
                        font-weight: 900;
                        font-size: 28px;
                        line-height: 1;
                      "
                      >01</span
                    >
                    <span style="display: flex; gap: 6px"
                      ><sc-for
                        list="{{ projects }}"
                        as="p"
                        hint-placeholder-count="4"
                        ><span
                          data-sdot="1"
                          style="
                            width: 22px;
                            height: 4px;
                            border-radius: 4px;
                            background: #4a463f;
                            display: block;
                            transition:
                              background 300ms,
                              width 300ms;
                          "
                        ></span></sc-for
                    ></span>
                    <span
                      style="
                        font-family:
                          &quot;Big Shoulders Display&quot;, sans-serif;
                        font-weight: 900;
                        font-size: 28px;
                        line-height: 1;
                        color: #8a857b;
                      "
                      >04</span
                    >
                  </span>
                </div>
                <sc-for list="{{ projects }}" as="p" hint-placeholder-count="1">
                  <article
                    data-scard="1"
                    style="position:absolute;left:clamp(12px,3vw,40px);right:clamp(12px,3vw,40px);top:124px;bottom:clamp(12px,3vh,28px);border-radius:clamp(20px,3vw,36px);overflow:hidden;background:{{ p.bg }};color:{{ p.fg }};transform-origin:50% 0%;will-change:transform;z-index:{{ p.z }};box-shadow:0 -20px 60px rgba(0,0,0,0.35)"
                  >
                    <div
                      style="
                        position: absolute;
                        inset: 0;
                        display: grid;
                        grid-template-columns: repeat(
                          auto-fit,
                          minmax(min(100%, 320px), 1fr)
                        );
                        grid-auto-rows: minmax(0, 1fr);
                        gap: clamp(12px, 2vw, 28px);
                        padding: clamp(16px, 2.4vw, 32px);
                      "
                    >
                      <div
                        style="
                          display: flex;
                          flex-direction: column;
                          justify-content: space-between;
                          gap: 16px;
                          min-height: 0;
                        "
                      >
                        <div
                          style="
                            display: flex;
                            justify-content: space-between;
                            align-items: flex-start;
                            gap: 12px;
                          "
                        >
                          <span
                            style="
                              font-family:
                                &quot;Big Shoulders Display&quot;, sans-serif;
                              font-weight: 900;
                              font-size: clamp(3.5rem, min(9vw, 16vh), 8rem);
                              line-height: 0.8;
                            "
                            >{{ p.num }}</span
                          >
                          <a
                            href="#"
                            data-magnet="1"
                            onClick="{{ goWork }}"
                            style="flex:none;width:clamp(76px,9vw,112px);height:clamp(76px,9vw,112px);border-radius:999px;background:{{ p.fg }};color:{{ p.bg }};display:flex;align-items:center;justify-content:center;text-align:center;font-weight:800;font-size:var(--text-body-sm);line-height:1.15"
                            >View<br />Project ↗</a
                          >
                        </div>
                        <div
                          style="
                            display: flex;
                            flex-direction: column;
                            gap: 14px;
                            min-height: 0;
                          "
                        >
                          <div style="display: flex; flex-wrap: wrap; gap: 6px">
                            <sc-for
                              list="{{ p.tags }}"
                              as="tg"
                              hint-placeholder-count="3"
                              ><span
                                data-stag="1"
                                style="
                                  font-size: 12px;
                                  font-weight: 700;
                                  padding: 5px 11px;
                                  border-radius: 999px;
                                  border: 1.5px solid currentColor;
                                  white-space: nowrap;
                                "
                                >{{ tg }}</span
                              ></sc-for
                            >
                          </div>
                          <h3
                            style="
                              margin: 0;
                              overflow: hidden;
                              font-family:
                                &quot;Big Shoulders Display&quot;, sans-serif;
                              font-weight: 900;
                              text-transform: uppercase;
                              font-size: clamp(
                                2.25rem,
                                min(5.5vw, 10vh),
                                5.5rem
                              );
                              line-height: 0.88;
                              text-wrap: balance;
                            "
                          >
                            <span data-stitle="1" style="display: block"
                              >{{ p.title }}</span
                            >
                          </h3>
                        </div>
                      </div>
                      <div
                        data-simgwrap="1"
                        style="
                          position: relative;
                          border-radius: clamp(14px, 2vw, 24px);
                          overflow: hidden;
                          background: rgba(20, 18, 16, 0.2);
                          min-height: 0;
                        "
                      >
                        <img
                          data-simg="1"
                          src="{{ p.img }}"
                          alt="{{ p.title }}"
                          style="
                            position: absolute;
                            inset: 0;
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                            will-change: transform;
                          "
                        />
                      </div>
                    </div>
                    <div
                      data-sshade="1"
                      style="
                        position: absolute;
                        inset: 0;
                        background: #000;
                        opacity: 0;
                        pointer-events: none;
                      "
                    ></div>
                  </article>
                </sc-for>
              </div>
            </section>

            <section
              data-svcsec="1"
              style="
                background: #f3f0ea;
                padding: clamp(96px, 12vw, 170px) 0;
                overflow: hidden;
              "
            >
              <div
                style="
                  max-width: none;
                  margin: 0 auto;
                  padding: 0 clamp(20px, 4vw, 56px) clamp(40px, 5vw, 72px);
                  display: flex;
                  justify-content: space-between;
                  align-items: flex-end;
                  gap: 24px;
                  flex-wrap: wrap;
                "
              >
                <div style="display: flex; flex-direction: column; gap: 18px">
                  <div
                    data-reveal="up"
                    style="
                      display: flex;
                      align-items: center;
                      gap: 10px;
                      font-size: var(--text-body-sm);
                      font-weight: 700;
                      white-space: nowrap;
                    "
                  >
                    <span
                      style="
                        flex: none;
                        width: 8px;
                        height: 8px;
                        border-radius: 999px;
                        background: #ff4d1f;
                        display: block;
                      "
                    ></span
                    >Services
                  </div>
                  <h2
                    style="
                      margin: 0;
                      font-family:
                        &quot;Big Shoulders Display&quot;, sans-serif;
                      font-weight: 900;
                      text-transform: uppercase;
                      font-size: clamp(2.5rem, 5vw, 4.5rem);
                      line-height: 0.9;
                    "
                  >
                    <span style="display: block; overflow: hidden"
                      ><span data-reveal="line" style="display: block"
                        >Creative &amp; Modern Services</span
                      ></span
                    >
                  </h2>
                </div>
                <a
                  href="#"
                  data-reveal="up"
                  onClick="{{ goServices }}"
                  style="
                    display: inline-flex;
                    align-items: center;
                    gap: 12px;
                    height: 48px;
                    padding: 0 6px 0 20px;
                    border-radius: 999px;
                    background: #141210;
                    color: #f3f0ea;
                    font-weight: 700;
                    font-size: var(--text-body-sm);
                    white-space: nowrap;
                  "
                  style-hover="background:#ff4d1f;color:#141210"
                  >All Services<span
                    style="
                      width: 36px;
                      height: 36px;
                      border-radius: 999px;
                      background: #dcff4f;
                      color: #141210;
                      display: flex;
                      align-items: center;
                      justify-content: center;
                    "
                    >↗</span
                  ></a
                >
              </div>
              <div
                onMouseLeave="{{ leaveSvc }}"
                style="border-top: 1.5px solid #141210"
              >
                <sc-for list="{{ services }}" as="s" hint-placeholder-count="5">
                  <a
                    href="#"
                    onClick="{{ goServices }}"
                    onMouseEnter="{{ s.onHover }}"
                    style="display:block;position:relative;border-bottom:1.5px solid #141210;color:#141210;overflow:hidden;background:{{ s.rowBg2 }};transition:background 400ms"
                  >
                    <div
                      data-srow="1"
                      data-dir="{{ s.dir }}"
                      style="
                        display: flex;
                        align-items: center;
                        gap: clamp(16px, 3vw, 40px);
                        padding: clamp(10px, 1.6vw, 22px) clamp(20px, 4vw, 56px);
                        white-space: nowrap;
                        will-change: transform;
                      "
                    >
                      <span
                        style="flex:none;font-family:var(--font-mono);font-size:var(--text-caption);padding:5px 10px;border-radius:999px;border:1.5px solid #141210;background:{{ s.numBg }};transition:background 300ms"
                        >{{ s.num }}</span
                      >
                      <span
                        style="
                          position: relative;
                          display: block;
                          font-family:
                            &quot;Big Shoulders Display&quot;, sans-serif;
                          font-weight: 900;
                          text-transform: uppercase;
                          font-size: clamp(3.25rem, 10vw, 10rem);
                          line-height: 0.9;
                        "
                      >
                        <span
                          style="
                            display: block;
                            color: transparent;
                            -webkit-text-stroke: 1.5px #141210;
                          "
                          >{{ s.name }}</span
                        >
                        <span
                          style="position:absolute;inset:0;display:block;color:#141210;clip-path:{{ s.fill }};transition:clip-path 700ms cubic-bezier(.7,0,.2,1)"
                          >{{ s.name }}</span
                        >
                      </span>
                      <span
                        style="flex:none;font-size:clamp(28px,4vw,56px);line-height:1;transition:transform 500ms cubic-bezier(.2,.7,.2,1);transform:rotate({{ s.arrowRot2 }})"
                        >↗</span
                      >
                    </div>
                  </a>
                </sc-for>
              </div>
            </section>

            <section
              style="padding: clamp(48px, 6vw, 96px) clamp(12px, 2vw, 24px)"
            >
              <div
                style="
                  max-width: none;
                  margin: 0 auto;
                  background: #e6e1d8;
                  border-radius: clamp(28px, 5vw, 72px);
                  padding: clamp(64px, 9vw, 128px) clamp(20px, 4vw, 72px);
                "
              >
                <div
                  style="
                    text-align: center;
                    margin-bottom: clamp(48px, 6vw, 80px);
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    gap: 16px;
                  "
                >
                  <div
                    data-reveal="up"
                    style="
                      display: flex;
                      align-items: center;
                      gap: 10px;
                      font-size: var(--text-body-sm);
                      font-weight: 700;
                      white-space: nowrap;
                    "
                  >
                    <span
                      style="
                        flex: none;
                        width: 8px;
                        height: 8px;
                        border-radius: 999px;
                        background: #ff4d1f;
                        display: block;
                      "
                    ></span
                    >How it works
                  </div>
                  <h2
                    style="
                      margin: 0;
                      font-family:
                        &quot;Big Shoulders Display&quot;, sans-serif;
                      font-weight: 900;
                      text-transform: uppercase;
                      font-size: clamp(2.75rem, 7vw, 6rem);
                      line-height: 0.9;
                    "
                  >
                    <span style="display: block; overflow: hidden"
                      ><span data-reveal="line" style="display: block"
                        >Step by Step Working Process</span
                      ></span
                    >
                  </h2>
                </div>
                <div
                  data-fillwrap="1"
                  style="
                    overflow-x: auto;
                    padding-bottom: 32px;
                    margin-bottom: -32px;
                  "
                >
                  <div style="position: relative; min-width: 760px">
                    <div
                      style="
                        position: absolute;
                        left: 12.5%;
                        right: 12.5%;
                        top: 13px;
                        height: 2px;
                        background-image: repeating-linear-gradient(
                          90deg,
                          #b9b3a8 0 6px,
                          transparent 6px 12px
                        );
                      "
                    >
                      <div
                        data-fill="1"
                        style="
                          position: absolute;
                          inset: 0;
                          background: #141210;
                          transform-origin: left;
                          transform: scaleX(0);
                        "
                      ></div>
                    </div>
                    <div
                      style="
                        display: grid;
                        grid-template-columns: repeat(4, minmax(0, 1fr));
                        gap: clamp(14px, 2vw, 28px);
                        align-items: start;
                      "
                    >
                      <sc-for
                        list="{{ process }}"
                        as="st"
                        hint-placeholder-count="4"
                      >
                        <div
                          data-reveal="up"
                          data-delay="{{ st.delay }}"
                          style="
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                            gap: 22px;
                          "
                        >
                          <span
                            style="width:22px;height:22px;margin:2px 0;background:{{ st.markerBg }};border:2px solid #141210;transform:rotate(45deg);border-radius:3px;display:block;transition:background 300ms;position:relative;z-index:1"
                          ></span>
                          <div
                            style="position:relative;width:100%;background:#fbfaf8;border-radius:28px;padding:32px 24px 52px;text-align:center;display:flex;flex-direction:column;align-items:center;transition:box-shadow 300ms;box-shadow:{{ st.shadow }}"
                          >
                            <span
                              style="
                                font-family:
                                  &quot;Big Shoulders Display&quot;, sans-serif;
                                font-weight: 800;
                                text-transform: uppercase;
                                font-size: 20px;
                                line-height: 1;
                              "
                              >Step {{ st.num }}</span
                            >
                            <h3
                              style="margin:14px 0 0;font-family:'Big Shoulders Display',sans-serif;font-weight:900;text-transform:uppercase;font-size:clamp(1.9rem,2.6vw,2.5rem);line-height:0.95;color:{{ st.titleColor }};transition:color 300ms"
                            >
                              {{ st.title }}
                            </h3>
                            <div
                              style="display:grid;grid-template-rows:{{ st.rows }};transition:grid-template-rows 450ms cubic-bezier(.4,0,.2,1);width:100%"
                            >
                              <div style="overflow: hidden">
                                <p
                                  style="margin:0;padding-top:18px;font-size:var(--text-body-sm);line-height:1.6;color:#4a463f;text-wrap:pretty;transition:opacity 350ms;opacity:{{ st.textOpacity }}"
                                >
                                  {{ st.text }}
                                </p>
                              </div>
                            </div>
                            <button
                              onClick="{{ st.onToggle }}"
                              aria-label="Toggle step"
                              style="position:absolute;left:50%;bottom:-26px;margin-left:-26px;width:52px;height:52px;border-radius:999px;border:4px solid #e6e1d8;background:{{ st.btnBg }};color:{{ st.btnFg }};cursor:pointer;display:flex;align-items:center;justify-content:center;transition:background 250ms,color 250ms"
                            >
                              <svg
                                width="18"
                                height="18"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                style="transition:transform 400ms cubic-bezier(.2,.7,.2,1);transform:rotate({{ st.chevron }})"
                              >
                                <path d="m6 9 6 6 6-6"></path>
                              </svg>
                            </button>
                          </div>
                        </div>
                      </sc-for>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <section
              style="
                padding: clamp(96px, 12vw, 160px) 0 clamp(64px, 8vw, 120px);
                overflow: hidden;
              "
            >
              <div
                style="
                  max-width: none;
                  margin: 0 auto;
                  padding: 0 clamp(20px, 4vw, 56px);
                  text-align: center;
                "
              >
                <h2
                  style="
                    margin: 0;
                    font-family: &quot;Big Shoulders Display&quot;, sans-serif;
                    font-weight: 900;
                    text-transform: uppercase;
                    font-size: clamp(3.5rem, 11vw, 10rem);
                    line-height: 0.86;
                    position: relative;
                    display: inline-block;
                  "
                >
                  <span style="display: block; overflow: hidden"
                    ><span data-reveal="line" style="display: block"
                      >What Our</span
                    ></span
                  >
                  <span style="display: block; overflow: hidden"
                    ><span
                      data-reveal="line"
                      data-delay="90"
                      style="display: block"
                      >Customers Say</span
                    ></span
                  >
                  <span
                    data-reveal="up"
                    data-delay="350"
                    style="position: absolute; left: 18%; top: 30%; z-index: 2"
                    ><span
                      style="
                        display: block;
                        background: #dcff4f;
                        color: #141210;
                        font-weight: 800;
                        font-size: clamp(1rem, 2vw, 1.6rem);
                        padding: 6px 16px;
                        transform: rotate(-9deg);
                        white-space: nowrap;
                        box-shadow: 0 8px 20px rgba(20, 18, 16, 0.12);
                      "
                      >Our Testimonials</span
                    ></span
                  >
                </h2>
                <p
                  data-reveal="up"
                  style="
                    margin: 20px auto 0;
                    max-width: 520px;
                    font-size: var(--text-body);
                    color: #4a463f;
                  "
                >
                  What Our Customers Say About Our Services
                </p>
              </div>
              <div
                style="
                  overflow-x: auto;
                  padding: clamp(48px, 6vw, 80px) clamp(20px, 4vw, 56px) 64px;
                "
              >
                <div
                  data-fan="1"
                  onMouseLeave="{{ leaveT }}"
                  style="
                    display: flex;
                    justify-content: center;
                    align-items: flex-start;
                    width: max-content;
                    min-width: 100%;
                    margin: 0 auto;
                  "
                >
                  <sc-for
                    list="{{ testimonials }}"
                    as="t"
                    hint-placeholder-count="4"
                  >
                    <div
                      data-fancard="1"
                      style="flex:none;margin-left:{{ t.ml }};position:relative;z-index:{{ t.z }};will-change:transform"
                    >
                      <figure
                        onMouseEnter="{{ t.onEnter }}"
                        style="margin:0;width:clamp(220px,25vw,330px);min-height:clamp(320px,34vw,440px);border-radius:24px;padding:clamp(22px,2.4vw,30px);display:flex;flex-direction:column;justify-content:space-between;gap:28px;background:{{ t.bg }};color:{{ t.fg }};transform:{{ t.transform }};transition:transform 600ms cubic-bezier(.2,.7,.2,1),box-shadow 400ms;box-shadow:{{ t.shadow }};cursor:default;text-align:left"
                      >
                        <span
                          style="font-family:'Big Shoulders Display',sans-serif;font-weight:900;font-size:88px;line-height:0.6;color:{{ t.accent }};height:44px"
                          >“</span
                        >
                        <blockquote
                          style="
                            margin: 0;
                            font-size: clamp(1rem, 1.35vw, 1.2rem);
                            line-height: 1.5;
                            font-weight: 500;
                            text-wrap: pretty;
                          "
                        >
                          {{ t.quote }}
                        </blockquote>
                        <figcaption
                          style="display: flex; align-items: center; gap: 12px"
                        >
                          <img
                            src="{{ t.img }}"
                            alt="{{ t.name }}"
                            style="
                              width: 44px;
                              height: 44px;
                              border-radius: 999px;
                              object-fit: cover;
                              background: #d8d4cc;
                              flex: none;
                            "
                          />
                          <span
                            style="
                              display: flex;
                              flex-direction: column;
                              gap: 2px;
                            "
                            ><strong
                              style="
                                font-family:
                                  &quot;Big Shoulders Display&quot;, sans-serif;
                                font-weight: 800;
                                text-transform: uppercase;
                                font-size: 20px;
                                line-height: 1;
                              "
                              >{{ t.name }}</strong
                            ><span
                              style="
                                font-size: var(--text-caption);
                                opacity: 0.7;
                              "
                              >{{ t.role }}</span
                            ></span
                          >
                        </figcaption>
                      </figure>
                    </div>
                  </sc-for>
                </div>
              </div>
            </section>

            <section
              style="
                max-width: none;
                margin: 0 auto;
                padding: clamp(96px, 12vw, 160px) clamp(20px, 4vw, 56px);
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
                <h2
                  data-reveal="up"
                  style="
                    margin: 0;
                    font-family: &quot;Big Shoulders Display&quot;, sans-serif;
                    font-weight: 900;
                    text-transform: uppercase;
                    font-size: clamp(3rem, 8vw, 7rem);
                    line-height: 0.88;
                  "
                >
                  Latest Insights
                </h2>
                <a
                  href="#"
                  data-reveal="up"
                  onClick="{{ goBlog }}"
                  style="
                    display: inline-flex;
                    align-items: center;
                    height: 48px;
                    padding: 0 22px;
                    border-radius: 999px;
                    border: 1.5px solid #141210;
                    font-weight: 700;
                    font-size: var(--text-body-sm);
                  "
                  style-hover="background:#141210;color:#f3f0ea"
                  >Blog &amp; News ↗</a
                >
              </div>
              <div
                style="
                  display: grid;
                  grid-template-columns: repeat(
                    auto-fit,
                    minmax(min(100%, 320px), 1fr)
                  );
                  gap: 24px;
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
                      padding: 14px;
                      border-radius: 14px;
                      background: #fbfaf8;
                      border: 1px solid #e6e1d8;
                      transition: transform 400ms cubic-bezier(0.2, 0.7, 0.2, 1);
                    "
                    style-hover="transform:translateY(-6px)"
                  >
                    <div
                      style="
                        aspect-ratio: 16/10;
                        border-radius: 8px;
                        overflow: hidden;
                        background: #e6e1d8;
                      "
                    >
                      <img
                        src="{{ b.img }}"
                        alt="{{ b.title }}"
                        style="width: 100%; height: 100%; object-fit: cover"
                      />
                    </div>
                    <span
                      style="
                        align-self: flex-start;
                        font-family: var(--font-mono);
                        font-size: 12px;
                        padding: 4px 10px;
                        border-radius: 999px;
                        background: #141210;
                        color: #dcff4f;
                      "
                      >{{ b.date }}</span
                    >
                    <h3
                      style="
                        margin: 0 0 6px;
                        font-family:
                          &quot;Big Shoulders Display&quot;, sans-serif;
                        font-weight: 800;
                        text-transform: uppercase;
                        font-size: 30px;
                        line-height: 1;
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

          <!-- ================= INNER PAGE HEADER ================= -->
          <sc-if value="{{ isInner }}" hint-placeholder-val="{{ false }}">
            <section
              style="
                background: #ff4d1f;
                color: #141210;
                padding: clamp(140px, 16vw, 200px) 0 clamp(48px, 6vw, 80px);
              "
            >
              <div
                style="
                  max-width: none;
                  margin: 0 auto;
                  padding: 0 clamp(20px, 4vw, 56px);
                "
              >
                <div
                  data-reveal="up"
                  style="
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    font-size: var(--text-body-sm);
                    font-weight: 700;
                    margin-bottom: 24px;
                  "
                >
                  <span
                    style="
                      width: 8px;
                      height: 8px;
                      border-radius: 999px;
                      background: #141210;
                      display: block;
                    "
                  ></span
                  >{{ innerEyebrow }}
                </div>
                <h1
                  style="
                    margin: 0;
                    font-family: &quot;Big Shoulders Display&quot;, sans-serif;
                    font-weight: 900;
                    text-transform: uppercase;
                    font-size: clamp(3.75rem, 13vw, 13rem);
                    line-height: 0.84;
                  "
                >
                  <span style="display: block; overflow: hidden"
                    ><span data-reveal="line" style="display: block"
                      >{{ innerTitle1 }}</span
                    ></span
                  >
                  <span style="display: block; overflow: hidden"
                    ><span
                      data-reveal="line"
                      data-delay="100"
                      style="display: block; color: #f3f0ea"
                      >{{ innerTitle2 }}</span
                    ></span
                  >
                </h1>
              </div>
            </section>
          </sc-if>

          <!-- ================= WORK ================= -->
          <sc-if value="{{ isWork }}" hint-placeholder-val="{{ false }}">
            <div
              style="
                position: sticky;
                top: 68px;
                z-index: 30;
                background: rgba(243, 240, 234, 0.88);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                border-bottom: 1.5px solid #141210;
              "
            >
              <div
                style="
                  padding: 14px clamp(20px, 4vw, 56px);
                  display: flex;
                  justify-content: space-between;
                  align-items: center;
                  gap: 16px;
                  flex-wrap: wrap;
                "
              >
                <div style="display: flex; gap: 8px; flex-wrap: wrap">
                  <sc-for
                    list="{{ workFilters }}"
                    as="f"
                    hint-placeholder-count="5"
                  >
                    <button
                      onClick="{{ f.onClick }}"
                      style="flex:none;white-space:nowrap;display:flex;align-items:center;gap:8px;height:40px;padding:0 6px 0 16px;border-radius:999px;border:1.5px solid #141210;background:{{ f.bg }};color:{{ f.fg }};font-family:var(--font-body);font-weight:700;font-size:var(--text-body-sm);cursor:pointer;transition:background 250ms,color 250ms"
                    >
                      {{ f.label }}<span
                        style="min-width:28px;height:28px;padding:0 6px;border-radius:999px;background:{{ f.cBg }};color:{{ f.cFg }};font-family:var(--font-mono);font-size:12px;display:flex;align-items:center;justify-content:center"
                        >{{ f.count }}</span
                      >
                    </button>
                  </sc-for>
                </div>
                <div
                  style="
                    display: flex;
                    padding: 4px;
                    border-radius: 999px;
                    background: #141210;
                    position: relative;
                  "
                >
                  <span
                    style="position:absolute;top:4px;bottom:4px;left:4px;width:calc(50% - 4px);border-radius:999px;background:#ff4d1f;transition:transform 450ms cubic-bezier(.7,0,.2,1);transform:translateX({{ viewX }})"
                  ></span>
                  <button
                    onClick="{{ setGrid }}"
                    style="position:relative;z-index:1;width:96px;height:34px;border:none;background:transparent;color:{{ gridFg }};font-family:var(--font-body);font-weight:700;font-size:var(--text-body-sm);cursor:pointer;transition:color 300ms"
                  >
                    Showcase
                  </button>
                  <button
                    onClick="{{ setList }}"
                    style="position:relative;z-index:1;width:96px;height:34px;border:none;background:transparent;color:{{ listFg }};font-family:var(--font-body);font-weight:700;font-size:var(--text-body-sm);cursor:pointer;transition:color 300ms"
                  >
                    Index
                  </button>
                </div>
              </div>
            </div>

            <section
              style="
                padding: clamp(40px, 5vw, 72px) clamp(20px, 4vw, 56px) 0;
                display: flex;
                justify-content: space-between;
                align-items: flex-end;
                gap: 24px;
                flex-wrap: wrap;
              "
            >
              <div
                style="
                  display: flex;
                  flex-direction: column;
                  gap: 16px;
                  max-width: 640px;
                "
              >
                <h2
                  style="
                    margin: 0;
                    font-family: &quot;Big Shoulders Display&quot;, sans-serif;
                    font-weight: 900;
                    text-transform: uppercase;
                    font-size: clamp(2.25rem, 4.5vw, 4rem);
                    line-height: 0.9;
                  "
                >
                  <span style="display: block; overflow: hidden"
                    ><span data-reveal="line" style="display: block"
                      >Designs That Speak for Themselves</span
                    ></span
                  >
                </h2>
                <p
                  data-reveal="up"
                  style="
                    margin: 0;
                    font-size: var(--text-body-lg);
                    line-height: 1.5;
                    font-weight: 500;
                    color: #4a463f;
                    text-wrap: pretty;
                  "
                >
                  Scroll through to play each project. Hover to look closer.
                </p>
              </div>
              <span
                data-reveal="up"
                style="
                  font-family: &quot;Big Shoulders Display&quot;, sans-serif;
                  font-weight: 900;
                  text-transform: uppercase;
                  font-size: clamp(4rem, 10vw, 9rem);
                  line-height: 0.8;
                  display: flex;
                  align-items: flex-start;
                  gap: 6px;
                "
                >{{ workCount }}<span
                  style="
                    font-family: var(--font-mono);
                    font-weight: 400;
                    font-size: var(--text-caption);
                    text-transform: none;
                    margin-top: 8px;
                  "
                  >projects</span
                ></span
              >
            </section>

            <sc-if value="{{ isGrid }}" hint-placeholder-val="{{ true }}">
              <section
                onMouseLeave="{{ leaveWork }}"
                style="
                  padding: clamp(56px, 7vw, 110px) clamp(20px, 4vw, 56px)
                    clamp(80px, 10vw, 140px);
                  display: flex;
                  flex-direction: column;
                  gap: clamp(96px, 12vw, 180px);
                "
              >
                <sc-for list="{{ workList }}" as="p" hint-placeholder-count="3">
                  <article
                    data-wspread="1"
                    data-num="{{ p.num }}"
                    data-name="{{ p.title }}"
                    style="
                      display: grid;
                      grid-template-columns: repeat(
                        auto-fit,
                        minmax(min(100%, 420px), 1fr)
                      );
                      gap: clamp(32px, 5vw, 80px);
                      align-items: center;
                    "
                  >
                    <a
                      href="#"
                      onMouseEnter="{{ p.onEnter }}"
                      onClick="{{ p.onClick }}"
                      style="position:relative;display:block;order:{{ p.mediaOrder }};cursor:{{ p.cursor }};flex:1.4"
                    >
                      <span
                        data-wblock="1"
                        data-dir="{{ p.dir }}"
                        style="position:absolute;inset:0;border-radius:clamp(20px,2.4vw,32px);background:{{ p.bg }};transform-origin:50% 50%;will-change:transform"
                      ></span>
                      <div
                        data-reveal="img"
                        style="
                          position: relative;
                          overflow: hidden;
                          border-radius: clamp(20px, 2.4vw, 32px);
                          aspect-ratio: 4/3;
                          background: #141210;
                        "
                      >
                        <video
                          data-wvideo="1"
                          data-parallax="0.08"
                          src="{{ p.video }}"
                          poster="{{ p.img }}"
                          muted="{{ true }}"
                          loop="{{ true }}"
                          playsinline="{{ true }}"
                          preload="metadata"
                          style="
                            position: absolute;
                            left: 0;
                            top: -10%;
                            width: 100%;
                            height: 120%;
                            object-fit: cover;
                          "
                        ></video>
                        <div
                          style="
                            position: absolute;
                            inset: 0;
                            background: radial-gradient(
                              120% 80% at 0% 100%,
                              rgba(20, 18, 16, 0.55),
                              rgba(20, 18, 16, 0) 60%
                            );
                            pointer-events: none;
                          "
                        ></div>
                        <span
                          style="position:absolute;left:clamp(16px,2vw,28px);bottom:clamp(8px,1.2vw,16px);font-family:'Big Shoulders Display',sans-serif;font-weight:900;text-transform:uppercase;font-size:clamp(5rem,11vw,10rem);line-height:0.8;color:#f3f0ea;transition:transform 600ms cubic-bezier(.2,.7,.2,1);transform:translateY({{ p.numY }})"
                          >{{ p.num }}</span
                        >
                        <span
                          style="
                            position: absolute;
                            top: 16px;
                            left: 16px;
                            display: flex;
                            align-items: center;
                            gap: 8px;
                            padding: 6px 12px 6px 10px;
                            border-radius: 999px;
                            background: rgba(20, 18, 16, 0.6);
                            backdrop-filter: blur(8px);
                            -webkit-backdrop-filter: blur(8px);
                            color: #f3f0ea;
                            font-family: var(--font-mono);
                            font-size: 12px;
                            white-space: nowrap;
                          "
                          ><span
                            style="
                              width: 8px;
                              height: 8px;
                              border-radius: 999px;
                              background: #ff4d1f;
                              display: block;
                            "
                          ></span
                          >Playing</span
                        >
                      </div>
                    </a>
                    <div
                      style="display:flex;flex-direction:column;gap:22px;order:{{ p.textOrder }};flex:1"
                    >
                      <div
                        data-reveal="up"
                        style="
                          display: flex;
                          align-items: center;
                          gap: 12px;
                          flex-wrap: wrap;
                        "
                      >
                        <span
                          style="font-family:var(--font-mono);font-size:12px;padding:5px 11px;border-radius:999px;background:{{ p.bg }};color:{{ p.fg }};white-space:nowrap"
                          >{{ p.cat }}</span
                        >
                        <span
                          style="
                            font-family: var(--font-mono);
                            font-size: 12px;
                            color: #8a857b;
                            white-space: nowrap;
                          "
                          >Project {{ p.num }} / {{ workTotal }}</span
                        >
                      </div>
                      <h3
                        style="
                          margin: 0;
                          font-family:
                            &quot;Big Shoulders Display&quot;, sans-serif;
                          font-weight: 900;
                          text-transform: uppercase;
                          font-size: clamp(2.75rem, 5.6vw, 5.5rem);
                          line-height: 0.88;
                          text-wrap: balance;
                        "
                      >
                        <sc-for
                          list="{{ p.titleLines }}"
                          as="ln"
                          hint-placeholder-count="2"
                          ><span style="display: block; overflow: hidden"
                            ><span
                              data-reveal="line"
                              data-delay="{{ ln.delay }}"
                              style="display: block"
                              >{{ ln.text }}</span
                            ></span
                          ></sc-for
                        >
                      </h3>
                      <p
                        data-reveal="up"
                        style="
                          margin: 0;
                          max-width: 480px;
                          font-size: var(--text-body-lg);
                          line-height: 1.55;
                          color: #4a463f;
                          text-wrap: pretty;
                        "
                      >
                        {{ p.desc }}
                      </p>
                      <div
                        data-reveal="up"
                        style="border-top: 1.5px solid #141210"
                      >
                        <sc-for
                          list="{{ p.scope }}"
                          as="sc"
                          hint-placeholder-count="4"
                        >
                          <div
                            style="
                              display: flex;
                              justify-content: space-between;
                              align-items: center;
                              gap: 16px;
                              padding: 11px 0;
                              border-bottom: 1px solid #d8d4cc;
                              font-weight: 600;
                              font-size: var(--text-body-sm);
                            "
                          >
                            <span
                              style="transition:transform 400ms cubic-bezier(.2,.7,.2,1);transition-delay:{{ sc.delay }};transform:translateX({{ p.scopeX }})"
                              >{{ sc.t }}</span
                            ><span
                              style="
                                font-family: var(--font-mono);
                                font-weight: 400;
                                font-size: 12px;
                                color: #8a857b;
                              "
                              >{{ sc.n }}</span
                            >
                          </div>
                        </sc-for>
                      </div>
                      <div data-reveal="up">
                        <a
                          href="#"
                          onClick="{{ p.onClick }}"
                          style="
                            display: inline-flex;
                            align-items: center;
                            gap: 12px;
                            height: 52px;
                            padding: 0 6px 0 22px;
                            border-radius: 999px;
                            background: #141210;
                            color: #f3f0ea;
                            font-weight: 700;
                            font-size: var(--text-body-sm);
                            white-space: nowrap;
                          "
                          style-hover="background:#ff4d1f;color:#141210"
                          >Start a similar project<span
                            style="width:40px;height:40px;border-radius:999px;background:{{ p.bg }};color:{{ p.fg }};display:flex;align-items:center;justify-content:center"
                            >↗</span
                          ></a
                        >
                      </div>
                    </div>
                  </article>
                </sc-for>
              </section>
              <div
                data-wpill="1"
                style="
                  position: fixed;
                  left: 50%;
                  bottom: 24px;
                  z-index: 35;
                  transform: translateX(-50%);
                  opacity: 0;
                  transition: opacity 300ms;
                  pointer-events: none;
                  display: flex;
                  align-items: center;
                  gap: 12px;
                  padding: 8px 18px 8px 8px;
                  border-radius: 999px;
                  background: #141210;
                  color: #f3f0ea;
                  box-shadow: 0 14px 30px rgba(20, 18, 16, 0.25);
                  white-space: nowrap;
                "
              >
                <span
                  data-wpnum="1"
                  style="
                    width: 40px;
                    height: 40px;
                    border-radius: 999px;
                    background: #ff4d1f;
                    color: #141210;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-family: &quot;Big Shoulders Display&quot;, sans-serif;
                    font-weight: 900;
                    text-transform: uppercase;
                    font-size: 20px;
                  "
                  >01</span
                >
                <span
                  data-wpname="1"
                  style="font-weight: 700; font-size: var(--text-body-sm)"
                ></span>
              </div>
            </sc-if>

            <sc-if value="{{ isList }}" hint-placeholder-val="{{ false }}">
              <section
                onMouseLeave="{{ leaveWork }}"
                style="
                  padding: clamp(48px, 6vw, 96px) 0 clamp(80px, 10vw, 140px);
                "
              >
                <div style="border-top: 1.5px solid #141210">
                  <sc-for
                    list="{{ workList }}"
                    as="p"
                    hint-placeholder-count="4"
                  >
                    <a
                      href="#"
                      data-reveal="up"
                      onMouseEnter="{{ p.onEnter }}"
                      onClick="{{ p.onClick }}"
                      style="display:grid;grid-template-columns:clamp(40px,6vw,90px) minmax(0,1fr) auto;align-items:center;gap:clamp(12px,2vw,32px);padding:clamp(18px,2.4vw,32px) clamp(20px,4vw,56px);border-bottom:1.5px solid #141210;color:{{ p.rowFg }};background:{{ p.rowBg }};transition:background 400ms,color 300ms"
                    >
                      <span
                        style="
                          font-family: var(--font-mono);
                          font-size: var(--text-caption);
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
                          style="font-family:'Big Shoulders Display',sans-serif;font-weight:900;text-transform:uppercase;font-size:clamp(2.5rem,7vw,6.5rem);line-height:0.88;transition:transform 600ms cubic-bezier(.2,.7,.2,1);transform:translateX({{ p.shift }})"
                          >{{ p.title }}</span
                        >
                        <span style="display: flex; flex-wrap: wrap; gap: 6px"
                          ><sc-for
                            list="{{ p.tags }}"
                            as="tg"
                            hint-placeholder-count="3"
                            ><span
                              style="
                                font-size: 12px;
                                font-weight: 700;
                                padding: 4px 10px;
                                border-radius: 999px;
                                border: 1.5px solid currentColor;
                                white-space: nowrap;
                              "
                              >{{ tg }}</span
                            ></sc-for
                          ></span
                        >
                      </span>
                      <span
                        style="width:clamp(48px,5vw,72px);height:clamp(48px,5vw,72px);border-radius:999px;border:1.5px solid currentColor;display:flex;align-items:center;justify-content:center;font-size:clamp(20px,2vw,28px);transition:transform 500ms cubic-bezier(.2,.7,.2,1);transform:rotate({{ p.arrow }})"
                        >↗</span
                      >
                    </a>
                  </sc-for>
                </div>
              </section>
            </sc-if>

            <div
              data-wcur="1"
              style="
                position: fixed;
                left: 0;
                top: 0;
                z-index: 46;
                pointer-events: none;
                will-change: transform;
              "
            >
              <div
                style="transition:opacity 300ms,transform 500ms cubic-bezier(.2,.7,.2,1);opacity:{{ wCurOp }};transform:scale({{ wCurScale }})"
              >
                <sc-if value="{{ isGrid }}" hint-placeholder-val="{{ true }}">
                  <div
                    style="
                      width: 112px;
                      height: 112px;
                      margin: -56px 0 0 -56px;
                      border-radius: 999px;
                      background: #dcff4f;
                      color: #141210;
                      display: flex;
                      align-items: center;
                      justify-content: center;
                      text-align: center;
                      font-weight: 800;
                      font-size: var(--text-body-sm);
                      line-height: 1.15;
                    "
                  >
                    Start<br />Similar ↗
                  </div>
                </sc-if>
                <sc-if value="{{ isList }}" hint-placeholder-val="{{ false }}">
                  <div
                    style="
                      width: clamp(240px, 26vw, 360px);
                      aspect-ratio: 4/5;
                      margin-left: calc(clamp(240px, 26vw, 360px) / -2);
                      margin-top: calc(clamp(240px, 26vw, 360px) * -0.625);
                      border-radius: 18px;
                      overflow: hidden;
                      position: relative;
                      background: #141210;
                      box-shadow: 0 30px 60px rgba(20, 18, 16, 0.25);
                    "
                  >
                    <sc-for list="{{ works }}" as="p" hint-placeholder-count="1"
                      ><img
                        src="{{ p.img }}"
                        alt=""
                        style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;transition:opacity 350ms,transform 700ms cubic-bezier(.2,.7,.2,1);opacity:{{ p.wOp }};transform:scale({{ p.wScale }})"
                    /></sc-for>
                  </div>
                </sc-if>
              </div>
            </div>
          </sc-if>

          <!-- ================= SERVICES ================= -->
          <sc-if value="{{ isServices }}" hint-placeholder-val="{{ false }}">
            <section
              style="
                max-width: none;
                margin: 0 auto;
                padding: clamp(64px, 8vw, 120px) clamp(20px, 4vw, 56px);
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
                "
              >
                <div>
                  <h2
                    data-reveal="up"
                    style="
                      margin: 0 0 20px;
                      font-family:
                        &quot;Big Shoulders Display&quot;, sans-serif;
                      font-weight: 900;
                      text-transform: uppercase;
                      font-size: clamp(2.5rem, 5vw, 4rem);
                      line-height: 0.9;
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
                      color: #4a463f;
                      text-wrap: pretty;
                    "
                  >
                    We partner with startups, scale-ups, and agencies for design
                    consulting, audits, and new design systems. Our
                    collaborative process and quick turnarounds make visual
                    storytelling sharper and results measurable.
                  </p>
                </div>
                <div
                  style="
                    background: #141210;
                    color: #f3f0ea;
                    border-radius: 14px;
                    padding: clamp(24px, 3vw, 40px);
                  "
                >
                  <h3
                    data-reveal="up"
                    style="
                      margin: 0 0 16px;
                      font-family:
                        &quot;Big Shoulders Display&quot;, sans-serif;
                      font-weight: 800;
                      text-transform: uppercase;
                      font-size: 32px;
                      color: #dcff4f;
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
                        padding: 14px 0;
                        border-bottom: 1px solid #2c2925;
                        display: flex;
                        gap: 14px;
                        align-items: center;
                      "
                    >
                      <span style="color: #ff4d1f">✶</span>{{ sp }}
                    </div>
                  </sc-for>
                </div>
              </div>
            </section>
            <sc-for list="{{ services }}" as="s" hint-placeholder-count="2">
              <section
                style="background:{{ s.sectionBg }};color:{{ s.sectionFg }};padding:clamp(64px,8vw,120px) 0"
              >
                <div
                  style="
                    max-width: none;
                    margin: 0 auto;
                    padding: 0 clamp(20px, 4vw, 56px);
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
                    style="position:relative;overflow:hidden;border-radius:14px;aspect-ratio:5/4;background:#2c2925;order:{{ s.order }}"
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
                  <div style="display: flex; flex-direction: column; gap: 22px">
                    <span
                      data-reveal="up"
                      style="
                        font-family:
                          &quot;Big Shoulders Display&quot;, sans-serif;
                        font-weight: 900;
                        font-size: 56px;
                        line-height: 1;
                        color: #ff4d1f;
                      "
                      >{{ s.num }}</span
                    >
                    <h2
                      data-reveal="up"
                      style="
                        margin: 0;
                        font-family:
                          &quot;Big Shoulders Display&quot;, sans-serif;
                        font-weight: 900;
                        text-transform: uppercase;
                        font-size: clamp(2.75rem, 6vw, 5rem);
                        line-height: 0.88;
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
                        opacity: 0.85;
                        text-wrap: pretty;
                      "
                    >
                      {{ s.desc }}
                    </p>
                    <div
                      data-reveal="up"
                      style="display: flex; flex-wrap: wrap; gap: 8px"
                    >
                      <sc-for
                        list="{{ s.bullets }}"
                        as="bl"
                        hint-placeholder-count="3"
                        ><span
                          style="
                            font-size: 13px;
                            font-weight: 600;
                            padding: 7px 13px;
                            border-radius: 999px;
                            border: 1px solid currentColor;
                          "
                          >{{ bl }}</span
                        ></sc-for
                      >
                    </div>
                    <div
                      style="
                        display: grid;
                        grid-template-columns: repeat(
                          auto-fit,
                          minmax(min(100%, 220px), 1fr)
                        );
                        gap: 12px;
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
                          style="background:{{ s.cardBg }};border-radius:12px;padding:18px;display:flex;flex-direction:column;gap:6px"
                        >
                          <strong
                            style="
                              font-family:
                                &quot;Big Shoulders Display&quot;, sans-serif;
                              font-weight: 800;
                              text-transform: uppercase;
                              font-size: 24px;
                              line-height: 1;
                            "
                            >{{ sb.t }}</strong
                          >
                          <span
                            style="
                              font-size: var(--text-body-sm);
                              line-height: 1.5;
                              opacity: 0.8;
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
              style="background: #dcff4f; padding: clamp(80px, 10vw, 140px) 0"
            >
              <div
                style="
                  max-width: none;
                  margin: 0 auto;
                  padding: 0 clamp(20px, 4vw, 56px);
                "
              >
                <div
                  data-reveal="up"
                  style="
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    font-size: var(--text-body-sm);
                    font-weight: 700;
                    margin-bottom: 20px;
                  "
                >
                  <span
                    style="
                      width: 8px;
                      height: 8px;
                      border-radius: 999px;
                      background: #141210;
                      display: block;
                    "
                  ></span
                  >Pricing Package
                </div>
                <h2
                  data-reveal="up"
                  style="
                    margin: 0 0 56px;
                    max-width: 1100px;
                    font-family: &quot;Big Shoulders Display&quot;, sans-serif;
                    font-weight: 900;
                    text-transform: uppercase;
                    font-size: clamp(2.75rem, 7vw, 6rem);
                    line-height: 0.88;
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
                    gap: 20px;
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
                      style="background:{{ pk.bg }};color:{{ pk.fg }};border-radius:16px;padding:clamp(28px,4vw,44px);display:flex;flex-direction:column;gap:24px"
                    >
                      <div>
                        <h3
                          style="
                            margin: 0 0 8px;
                            font-family:
                              &quot;Big Shoulders Display&quot;, sans-serif;
                            font-weight: 900;
                            text-transform: uppercase;
                            font-size: 48px;
                            line-height: 1;
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
                        style="display:flex;flex-direction:column;gap:10px;border-top:1px solid {{ pk.rule }};padding-top:22px"
                      >
                        <span
                          style="
                            font-family: var(--font-mono);
                            font-size: 12px;
                            opacity: 0.6;
                          "
                          >Includes:</span
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
                            <span style="color: #ff4d1f">✶</span>{{ i }}
                          </div></sc-for
                        >
                      </div>
                      <div
                        style="display:flex;flex-direction:column;gap:10px;border-top:1px solid {{ pk.rule }};padding-top:22px"
                      >
                        <span
                          style="
                            font-family: var(--font-mono);
                            font-size: 12px;
                            opacity: 0.6;
                          "
                          >Extras:</span
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
                            <span style="color: #ff4d1f">✶</span>{{ e }}
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
                        <a
                          href="#"
                          onClick="{{ goContact }}"
                          style="
                            display: inline-flex;
                            align-items: center;
                            height: 52px;
                            padding: 0 24px;
                            border-radius: 999px;
                            background: #ff4d1f;
                            color: #141210;
                            font-weight: 700;
                          "
                          style-hover="background:#dcff4f;color:#141210"
                          >Choose Package</a
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
            <div style="background: #ff4d1f; padding: 0 clamp(20px, 4vw, 56px)">
              <div
                data-reveal="img"
                style="
                  max-width: none;
                  margin: 0 auto;
                  position: relative;
                  overflow: hidden;
                  border-radius: 14px 14px 0 0;
                  aspect-ratio: 16/7;
                  background: #e2431a;
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
                max-width: none;
                margin: 0 auto;
                padding: clamp(96px, 12vw, 160px) clamp(20px, 4vw, 56px);
              "
            >
              <div
                data-reveal="up"
                style="
                  display: flex;
                  align-items: center;
                  gap: 10px;
                  font-size: var(--text-body-sm);
                  font-weight: 700;
                  margin-bottom: 28px;
                "
              >
                <span
                  style="
                    width: 8px;
                    height: 8px;
                    border-radius: 999px;
                    background: #ff4d1f;
                    display: block;
                  "
                ></span
                >About Agency
              </div>
              <p
                data-words="1"
                style="
                  margin: 0 0 48px;
                  font-family: &quot;Big Shoulders Display&quot;, sans-serif;
                  font-weight: 800;
                  text-transform: uppercase;
                  font-size: clamp(2.5rem, 6.4vw, 6rem);
                  line-height: 0.95;
                "
              >
                <sc-for
                  list="{{ aboutWords }}"
                  as="w"
                  hint-placeholder-count="10"
                  ><span style="opacity: 0.16; transition: opacity 200ms"
                    >{{ w }}
                  </span></sc-for
                >
              </p>
              <div
                style="
                  display: grid;
                  grid-template-columns: repeat(
                    auto-fit,
                    minmax(min(100%, 380px), 1fr)
                  );
                  gap: 32px;
                "
              >
                <p
                  data-reveal="up"
                  style="
                    margin: 0;
                    font-size: var(--text-body-lg);
                    line-height: 1.6;
                    color: #4a463f;
                  "
                >
                  At Briefffly Design Studio, we blend creativity and strategy
                  to craft designs that not only look stunning but also deliver
                  real impact. From sleek websites to engaging mobile
                  applications, our work helps brands stand out in the digital
                  landscape.
                </p>
                <p
                  data-reveal="up"
                  style="
                    margin: 0;
                    font-size: var(--text-body-lg);
                    line-height: 1.6;
                    color: #4a463f;
                  "
                >
                  Our team of passionate designers and developers is dedicated
                  to turning your vision into powerful digital experiences that
                  resonate with your audience.
                </p>
              </div>
            </section>
            <section
              style="
                background: #141210;
                color: #f3f0ea;
                padding: clamp(96px, 12vw, 160px) 0;
              "
            >
              <div
                style="
                  max-width: none;
                  margin: 0 auto;
                  padding: 0 clamp(20px, 4vw, 56px);
                "
              >
                <div
                  data-reveal="up"
                  style="
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    font-size: var(--text-body-sm);
                    font-weight: 700;
                    margin-bottom: 20px;
                    color: #dcff4f;
                  "
                >
                  <span
                    style="
                      width: 8px;
                      height: 8px;
                      border-radius: 999px;
                      background: #dcff4f;
                      display: block;
                    "
                  ></span
                  >Our Way, Simplified
                </div>
                <h2
                  data-reveal="up"
                  style="
                    margin: 0 0 64px;
                    max-width: 1000px;
                    font-size: clamp(1.5rem, 2.6vw, 2.25rem);
                    line-height: 1.3;
                    font-weight: 500;
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
                    gap: 20px;
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
                        border: 1px solid #2c2925;
                        border-radius: 14px;
                        padding: 28px;
                        display: flex;
                        flex-direction: column;
                        gap: 18px;
                        transition:
                          background 300ms,
                          color 300ms;
                      "
                      style-hover="background:#ff4d1f;color:#141210"
                    >
                      <span
                        style="
                          font-family:
                            &quot;Big Shoulders Display&quot;, sans-serif;
                          font-weight: 900;
                          font-size: 64px;
                          line-height: 1;
                        "
                        >{{ w.num }}</span
                      >
                      <h3
                        style="
                          margin: 0;
                          font-family:
                            &quot;Big Shoulders Display&quot;, sans-serif;
                          font-weight: 900;
                          text-transform: uppercase;
                          font-size: 44px;
                          line-height: 1;
                        "
                      >
                        {{ w.title }}
                      </h3>
                      <p
                        style="
                          margin: 0;
                          font-size: var(--text-body-sm);
                          line-height: 1.6;
                          opacity: 0.85;
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
                max-width: none;
                margin: 0 auto;
                padding: clamp(96px, 12vw, 160px) clamp(20px, 4vw, 56px);
              "
            >
              <h2
                data-reveal="up"
                style="
                  margin: 0 0 48px;
                  font-family: &quot;Big Shoulders Display&quot;, sans-serif;
                  font-weight: 900;
                  text-transform: uppercase;
                  font-size: clamp(3rem, 8vw, 7rem);
                  line-height: 0.88;
                "
              >
                Meet Our Experience Team Memeber
              </h2>
              <div style="border-top: 1.5px solid #141210">
                <sc-for list="{{ team }}" as="m" hint-placeholder-count="8">
                  <div
                    data-reveal="up"
                    style="
                      display: flex;
                      justify-content: space-between;
                      align-items: center;
                      gap: 16px;
                      padding: 18px clamp(0px, 1.5vw, 20px);
                      border-bottom: 1px solid #d8d4cc;
                      transition: background 250ms;
                    "
                    style-hover="background:#dcff4f"
                  >
                    <span
                      style="
                        font-family:
                          &quot;Big Shoulders Display&quot;, sans-serif;
                        font-weight: 900;
                        text-transform: uppercase;
                        font-size: clamp(1.75rem, 4vw, 3rem);
                        line-height: 1;
                      "
                      >{{ m.name }}</span
                    >
                    <span
                      style="
                        font-size: var(--text-body-sm);
                        font-weight: 600;
                        text-align: right;
                      "
                      >{{ m.role }}</span
                    >
                  </div>
                </sc-for>
              </div>
            </section>
            <section
              style="background: #e6e1d8; padding: clamp(96px, 12vw, 160px) 0"
            >
              <div
                style="
                  max-width: none;
                  margin: 0 auto;
                  padding: 0 clamp(20px, 4vw, 56px);
                "
              >
                <h2
                  data-reveal="up"
                  style="
                    margin: 0 0 48px;
                    font-family: &quot;Big Shoulders Display&quot;, sans-serif;
                    font-weight: 900;
                    text-transform: uppercase;
                    font-size: clamp(3rem, 8vw, 7rem);
                    line-height: 0.88;
                  "
                >
                  How we work
                </h2>
                <div
                  style="
                    display: grid;
                    grid-template-columns: repeat(
                      auto-fit,
                      minmax(min(100%, 220px), 1fr)
                    );
                    gap: 16px;
                  "
                >
                  <sc-for
                    list="{{ howWeWork }}"
                    as="h"
                    hint-placeholder-count="5"
                  >
                    <div
                      data-reveal="up"
                      data-delay="{{ h.delay }}"
                      style="
                        background: #f3f0ea;
                        border-radius: 14px;
                        padding: 22px;
                        display: flex;
                        flex-direction: column;
                        gap: 14px;
                      "
                    >
                      <span
                        style="
                          align-self: flex-start;
                          font-family: var(--font-mono);
                          font-size: 12px;
                          padding: 4px 10px;
                          border-radius: 999px;
                          background: #ff4d1f;
                          color: #141210;
                        "
                        >{{ h.num }}</span
                      >
                      <h3
                        style="
                          margin: 0;
                          font-family:
                            &quot;Big Shoulders Display&quot;, sans-serif;
                          font-weight: 800;
                          text-transform: uppercase;
                          font-size: 28px;
                          line-height: 1;
                        "
                      >
                        {{ h.title }}
                      </h3>
                      <p
                        style="
                          margin: 0;
                          font-size: var(--text-body-sm);
                          line-height: 1.55;
                          color: #4a463f;
                        "
                      >
                        {{ h.text }}
                      </p>
                    </div>
                  </sc-for>
                </div>
              </div>
            </section>
            <!-- <div
              style="
                background: #141210;
                color: #f3f0ea;
                padding: 20px 0;
                overflow: hidden;
              "
            >
              <div
                data-marquee="1"
                data-speed="0.8"
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
                      gap: 28px;
                      padding-right: 28px;
                      font-family:
                        &quot;Big Shoulders Display&quot;, sans-serif;
                      font-weight: 800;
                      text-transform: uppercase;
                      font-size: clamp(1.5rem, 3vw, 2.25rem);
                      white-space: nowrap;
                    "
                    >{{ m }}<span style="color: #dcff4f">✶</span></span
                  >
                </sc-for>
              </div>
            </div>
          </sc-if> -->
          </section>

          <section style="background:#fbfaf8;color:#141210;padding:clamp(80px,10vw,140px) clamp(20px,4vw,56px)">
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:clamp(32px,6vw,80px);align-items:start">

              <div>
                <div data-reveal="up" style="display:flex;align-items:center;gap:10px;font-size:var(--text-body-sm);font-weight:700;margin-bottom:24px">
                  <span style="width:8px;height:8px;border-radius:999px;background:#ff4d1f;display:block"></span>
                  Visit Us
                </div>

                <h2 data-reveal="up" style="margin:0;font-family:'Big Shoulders Display',sans-serif;font-weight:900;text-transform:uppercase;font-size:clamp(3rem,8vw,7rem);line-height:0.88">Find Our Studio in Ahmedabad</h2>
              </div>

              <div data-reveal="up" style="display:flex;flex-direction:column;align-items:flex-start;gap:20px">
                <span style="font-family:var(--font-mono);font-size:12px;color:#8a857b">Office Address</span>

                <p style="margin:0;font-size:var(--text-body-lg);line-height:1.8;color:#4a463f">
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
                  style="display:inline-flex;align-items:center;justify-content:center;gap:10px;padding:14px 22px;border-radius:999px;background:#ff4d1f;color:#141210;font-size:var(--text-body-sm);font-weight:700;text-decoration:none"
                  style-hover="background:#141210;color:#f3f0ea"
                >View Studio Location on Google Maps ↗</a>
              </div>

            </div>
          </section>

          <div style="background:#141210;color:#f3f0ea;padding:20px 0;overflow:hidden">
            <div data-marquee="1" data-speed="0.8" style="display:flex;width:max-content">
              <sc-for list="{{ marqueeServices }}" as="m" hint-placeholder-count="6">
                <span style="display:flex;align-items:center;gap:28px;padding-right:28px;font-family:'Big Shoulders Display',sans-serif;font-weight:800;text-transform:uppercase;font-size:clamp(1.5rem,3vw,2.25rem);white-space:nowrap">{{ m }}<span style="color:#dcff4f">✶</span></span>
              </sc-for>
            </div>
          </div>
        </sc-if>

          <!-- ================= BLOG ================= -->
          <sc-if value="{{ isBlog }}" hint-placeholder-val="{{ false }}">
            <section
              style="
                max-width: none;
                margin: 0 auto;
                padding: clamp(64px, 8vw, 120px) clamp(20px, 4vw, 56px);
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
                    border-top: 1.5px solid #141210;
                    align-items: center;
                    color: #141210;
                  "
                >
                  <div
                    style="
                      aspect-ratio: 16/10;
                      border-radius: 14px;
                      overflow: hidden;
                      background: #e6e1d8;
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
                  <div style="display: flex; flex-direction: column; gap: 18px">
                    <span
                      style="
                        align-self: flex-start;
                        font-family: var(--font-mono);
                        font-size: 12px;
                        padding: 4px 10px;
                        border-radius: 999px;
                        background: #141210;
                        color: #dcff4f;
                      "
                      >{{ b.date }}</span
                    >
                    <h2
                      style="
                        margin: 0;
                        font-family:
                          &quot;Big Shoulders Display&quot;, sans-serif;
                        font-weight: 900;
                        text-transform: uppercase;
                        font-size: clamp(2.25rem, 4.5vw, 3.75rem);
                        line-height: 0.92;
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
                        color: #4a463f;
                      "
                    >
                      {{ b.excerpt }}
                    </p>
                    <span style="font-weight: 700; color: #ff4d1f"
                      >Read the article ↗</span
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
                max-width: none;
                margin: 0 auto;
                padding: clamp(64px, 8vw, 120px) clamp(20px, 4vw, 56px);
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
                <!-- <div style="display: flex; flex-direction: column; gap: 28px">
                  <div
                    data-reveal="up"
                    style="
                      display: flex;
                      align-items: center;
                      gap: 10px;
                      font-size: var(--text-body-sm);
                      font-weight: 700;
                    "
                  >
                    <span
                      style="
                        width: 8px;
                        height: 8px;
                        border-radius: 999px;
                        background: #ff4d1f;
                        display: block;
                      "
                    ></span
                    >Contact Information
                  </div>
                  <h2
                    data-reveal="up"
                    style="
                      margin: 0;
                      font-family:
                        &quot;Big Shoulders Display&quot;, sans-serif;
                      font-weight: 900;
                      text-transform: uppercase;
                      font-size: clamp(3rem, 6vw, 5.5rem);
                      line-height: 0.88;
                    "
                  >
                    Get In Touch With Our Team
                  </h2>
                  <div
                    data-reveal="up"
                    style="
                      background: #141210;
                      color: #f3f0ea;
                      border-radius: 14px;
                      padding: 28px;
                      display: flex;
                      flex-direction: column;
                      gap: 8px;
                    "
                  >
                    <span
                      style="
                        font-family: var(--font-mono);
                        font-size: 12px;
                        color: #8a857b;
                      "
                      >Email Address</span
                    >
                    <a
                      href="mailto:sales@briefffly.com"
                      style="
                        font-family:
                          &quot;Big Shoulders Display&quot;, sans-serif;
                        font-weight: 800;
                        font-size: clamp(2rem, 4vw, 3rem);
                        color: #dcff4f;
                      "
                      >sales@briefffly.com</a
                    >
                  </div>
                </div> -->
                <div style="display:flex;flex-direction:column;gap:28px">
                  <div data-reveal="up" style="display:flex;align-items:center;gap:10px;font-size:var(--text-body-sm);font-weight:700"><span style="width:8px;height:8px;border-radius:999px;background:#ff4d1f;display:block"></span>Contact Information</div>

                  <h2 data-reveal="up" style="margin:0;font-family:'Big Shoulders Display',sans-serif;font-weight:900;text-transform:uppercase;font-size:clamp(3rem,6vw,5.5rem);line-height:0.88">Get In Touch With Our Team</h2>

                  <div data-reveal="up" style="background:#141210;color:#f3f0ea;border-radius:14px;padding:28px;display:flex;flex-direction:column;gap:8px">
                    <span style="font-family:var(--font-mono);font-size:12px;color:#8a857b">Email Address</span>
                    <a href="mailto:sales@briefffly.com" style="font-family:'Big Shoulders Display',sans-serif;font-weight:800;font-size:clamp(2rem,4vw,3rem);color:#dcff4f">sales@briefffly.com</a>
                  </div>

                  <div data-reveal="up" style="background:#141210;color:#f3f0ea;border-radius:14px;padding:28px;display:flex;flex-direction:column;gap:14px">
                    <span style="font-family:var(--font-mono);font-size:12px;color:#8a857b">Office Address</span>

                    <p style="margin:0;font-size:var(--text-body-lg);line-height:1.8;color:#ece9e2">
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
                      style="align-self:flex-start;font-size:var(--text-body-sm);font-weight:700;color:#ff4d1f;text-decoration:none"
                    >Visit Us on Google Maps ↗</a>
                  </div>
                </div>
                <div
                  data-reveal="up"
                  style="
                    background: #fbfaf8;
                    border: 1px solid #e6e1d8;
                    border-radius: 16px;
                    padding: clamp(24px, 3vw, 40px);
                    display: flex;
                    flex-direction: column;
                    gap: 18px;
                  "
                >
                  <span
                    style="
                      font-family: var(--font-mono);
                      font-size: 12px;
                      color: #8a857b;
                    "
                    >Send Message</span
                  >
                  <h2
                    style="
                      margin: 0 0 6px;
                      font-family:
                        &quot;Big Shoulders Display&quot;, sans-serif;
                      font-weight: 900;
                      text-transform: uppercase;
                      font-size: 44px;
                      line-height: 1;
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
                        padding: 22px;
                        border-radius: 12px;
                        background: #dcff4f;
                        color: #141210;
                        font-weight: 600;
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
                        hint-size="100%,70px"
                        value="{{ name }}"
                        on-change = "{{ onName}}"
                      ></x-import>
                      <x-import
                        component-from-global-scope="UniversalDesignSystem_25b065.Input"
                        label="Email"
                        type="email"
                        placeholder="you@company.com"
                        value="{{ email }}"
                        on-change = "{{ onEmail}}"
                        hint-size="100%,70px"
                      ></x-import>
                    </div>
                    <x-import
                      component-from-global-scope="UniversalDesignSystem_25b065.Select"
                      label="Select Subject"
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
                      on-change = "{{ onMessage}}"
                      hint-size="100%,140px"
                    ></x-import>
                    <button
                      onClick="{{ sendForm }}"
                      style="
                        align-self: flex-start;
                        height: 56px;
                        padding: 0 8px 0 26px;
                        border-radius: 999px;
                        border: none;
                        background: #141210;
                        color: #f3f0ea;
                        font-family: var(--font-body);
                        font-weight: 700;
                        font-size: var(--text-body);
                        cursor: pointer;
                        display: flex;
                        align-items: center;
                        gap: 14px;
                      "
                    >
                      Send Message<span
                        style="
                          width: 40px;
                          height: 40px;
                          border-radius: 999px;
                          background: #ff4d1f;
                          color: #141210;
                          display: flex;
                          align-items: center;
                          justify-content: center;
                        "
                        >↗</span
                      >
                    </button>
                  </sc-if>
                </div>
              </div>
            </section>
          </sc-if>

          <!-- ================= CTA + FOOTER ================= -->
          <section
            style="
              background: #ff4d1f;
              color: #141210;
              padding: clamp(96px, 12vw, 160px) 0 0;
              overflow: hidden;
            "
          >
            <div
              style="
                max-width: none;
                margin: 0 auto;
                padding: 0 clamp(20px, 4vw, 56px);
                display: grid;
                grid-template-columns: repeat(
                  auto-fit,
                  minmax(min(100%, 420px), 1fr)
                );
                gap: 40px;
                align-items: end;
              "
            >
              <h2
                style="
                  margin: 0;
                  font-family: &quot;Big Shoulders Display&quot;, sans-serif;
                  font-weight: 900;
                  text-transform: uppercase;
                  font-size: clamp(3.5rem, 9vw, 8.5rem);
                  line-height: 0.84;
                "
              >
                <span style="display: block; overflow: hidden"
                  ><span data-reveal="line" style="display: block"
                    >Have an</span
                  ></span
                >
                <span style="display: block; overflow: hidden"
                  ><span
                    data-reveal="line"
                    data-delay="80"
                    style="display: block; color: #f3f0ea"
                    >Idea?</span
                  ></span
                >
              </h2>
              <div
                style="
                  display: flex;
                  flex-direction: column;
                  gap: 28px;
                  align-items: flex-start;
                "
              >
                <p
                  data-reveal="up"
                  style="
                    margin: 0;
                    max-width: 520px;
                    font-size: var(--text-body-lg);
                    line-height: 1.5;
                    font-weight: 500;
                  "
                >
                  Let’s Turn Your Vision Into Designs That Inspire and Deliver
                  Results. Let’s bring it to life with designs that inspire and
                  deliver results. Connect with us today and start your creative
                  journey.
                </p>
                <div
                  data-reveal="up"
                  style="
                    display: flex;
                    gap: 12px;
                    flex-wrap: wrap;
                    align-items: center;
                  "
                >
                  <a
                    href="#"
                    data-magnet="1"
                    onClick="{{ goContact }}"
                    style="
                      width: 148px;
                      height: 148px;
                      border-radius: 999px;
                      background: #141210;
                      color: #f3f0ea;
                      display: flex;
                      align-items: center;
                      justify-content: center;
                      text-align: center;
                      font-weight: 700;
                      line-height: 1.2;
                      will-change: transform;
                    "
                    >Contact<br />Us ↗</a
                  >
                  <a
                    href="#"
                    onClick="{{ goWork }}"
                    style="
                      display: inline-flex;
                      align-items: center;
                      height: 52px;
                      padding: 0 24px;
                      border-radius: 999px;
                      border: 1.5px solid #141210;
                      font-weight: 700;
                    "
                    style-hover="background:#141210;color:#f3f0ea"
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
                margin-top: clamp(64px, 8vw, 112px);
                background: #141210;
                color: #f3f0ea;
                padding: clamp(18px, 2.4vw, 30px) 0;
                overflow: hidden;
              "
              style-hover="color:#dcff4f"
            >
              <div
                data-marquee="1"
                data-speed="1.5"
                data-dir="-1"
                style="display: flex; width: max-content"
              >
                <sc-for list="{{ marqueeB }}" as="m" hint-placeholder-count="6">
                  <span
                    style="
                      display: flex;
                      align-items: center;
                      gap: 36px;
                      padding-right: 36px;
                      font-family:
                        &quot;Big Shoulders Display&quot;, sans-serif;
                      font-weight: 900;
                      text-transform: uppercase;
                      font-size: clamp(3rem, 8vw, 7rem);
                      line-height: 1;
                      white-space: nowrap;
                    "
                    >{{ m }}<span style="color: #ff4d1f">✶</span></span
                  >
                </sc-for>
              </div>
            </a>
          </section>
          <footer style="background: #141210; color: #f3f0ea; overflow: hidden">
            <div
              style="
                max-width: none;
                margin: 0 auto;
                padding: clamp(56px, 7vw, 96px) clamp(20px, 4vw, 56px) 0;
                display: grid;
                grid-template-columns: repeat(
                  auto-fit,
                  minmax(min(100%, 150px), 1fr)
                );
                gap: 32px;
              "
            >
              <p
                style="
                  margin: 0;
                  font-size: var(--text-body);
                  line-height: 1.5;
                  color: #d8d4cc;
                  max-width: 280px;
                "
              >
                Where your brief becomes a brand story worth sharing.
              </p>
              <div style="display: flex; flex-direction: column; gap: 10px">
                <span
                  style="
                    font-family: var(--font-mono);
                    font-size: 12px;
                    color: #8a857b;
                    margin-bottom: 6px;
                  "
                  >Pages</span
                >
                <sc-for list="{{ navItems }}" as="n" hint-placeholder-count="5"
                  ><a
                    href="#"
                    onClick="{{ n.onClick }}"
                    style="font-size: var(--text-body-sm); color: #ece9e2"
                    style-hover="color:#ff4d1f"
                    >{{ n.label }}</a
                  ></sc-for
                >
              </div>
              <!-- <div style="display: flex; flex-direction: column; gap: 10px">
                <span
                  style="
                    font-family: var(--font-mono);
                    font-size: 12px;
                    color: #8a857b;
                    margin-bottom: 6px;
                  "
                  >Contact Us</span
                >
                <a
                  href="mailto:sales@briefffly.com"
                  style="font-size: var(--text-body-sm); color: #ece9e2"
                  style-hover="color:#ff4d1f"
                  >sales@briefffly.com</a
                >
              </div> -->
              <div style="display:flex;flex-direction:column;gap:10px">
                <span style="font-family:var(--font-mono);font-size:12px;color:#8a857b;margin-bottom:6px">Contact Us</span>

                <a href="mailto:sales@briefffly.com" style="font-size:var(--text-body-sm);color:#ece9e2" style-hover="color:#ff4d1f">sales@briefffly.com</a>

                <span style="font-family:var(--font-mono);font-size:12px;color:#8a857b;margin-top:12px">Office Address</span>

                <p style="margin:0;font-size:var(--text-body-sm);line-height:1.7;color:#d8d4cc">
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
                  style="font-size:var(--text-body-sm);font-weight:600;color:#ff4d1f;text-decoration:none"
                  style-hover="color:#dcff4f"
                >View on Google Maps ↗</a>
              </div>
              <div style="display: flex; flex-direction: column; gap: 10px">
                <span
                  style="
                    font-family: var(--font-mono);
                    font-size: 12px;
                    color: #8a857b;
                    margin-bottom: 6px;
                  "
                  >Follow Us</span
                >
                <a
                  href="https://x.com/brieffflystudio"
                  target="_blank"
                  style="font-size: var(--text-body-sm); color: #ece9e2"
                  style-hover="color:#ff4d1f"
                  >X / Twitter</a
                >
                <a
                  href="https://www.instagram.com/briefffly.studio"
                  target="_blank"
                  style="font-size: var(--text-body-sm); color: #ece9e2"
                  style-hover="color:#ff4d1f"
                  >Instagram</a
                >
                <a
                  href="https://www.linkedin.com/company/briefffly/"
                  target="_blank"
                  style="font-size: var(--text-body-sm); color: #ece9e2"
                  style-hover="color:#ff4d1f"
                  >LinkedIn</a
                >
              </div>
            </div>
            <div
              style="
                max-width: none;
                margin: 0 auto;
                padding: clamp(40px, 5vw, 72px) clamp(20px, 4vw, 56px) 0;
              "
            >
              <div
                style="
                  font-family: &quot;Big Shoulders Display&quot;, sans-serif;
                  font-weight: 900;
                  text-transform: uppercase;
                  font-size: clamp(5rem, 26vw, 24rem);
                  line-height: 0.78;
                  color: #ff4d1f;
                  letter-spacing: -0.01em;
                  overflow: hidden;
                "
              >
                <span data-reveal="line" style="display: block">Briefffly</span>
              </div>
            </div>
            <div
              style="
                max-width: none;
                margin: 0 auto;
                padding: 22px clamp(20px, 4vw, 56px) 28px;
                border-top: 1px solid #2c2925;
                font-size: var(--text-caption);
                color: #8a857b;
              "
            >
              Copyright © Briefffly, all rights reserved.
            </div>
          </footer>
        </main>

        <div
          data-sfloat="1"
          style="
            position: fixed;
            left: 0;
            top: 0;
            width: clamp(220px, 24vw, 320px);
            pointer-events: none;
            z-index: 45;
            will-change: transform;
          "
        >
          <div
            style="width:100%;border-radius:18px;overflow:hidden;background:#141210;padding:8px;box-shadow:0 30px 60px rgba(20,18,16,0.25);transition:opacity 300ms,transform 500ms cubic-bezier(.2,.7,.2,1);opacity:{{ floatOp }};transform:scale({{ floatScale }})"
          >
            <div
              style="
                position: relative;
                width: 100%;
                aspect-ratio: 4/3;
                border-radius: 12px;
                overflow: hidden;
              "
            >
              <sc-for list="{{ services }}" as="s" hint-placeholder-count="1"
                ><img
                  src="{{ s.img }}"
                  alt=""
                  style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;transition:opacity 350ms,transform 700ms cubic-bezier(.2,.7,.2,1);opacity:{{ s.floatImgOp }};transform:scale({{ s.floatImgScale }})"
              /></sc-for>
            </div>
            <div style="display: grid; padding: 10px 4px 4px">
              <sc-for list="{{ services }}" as="s" hint-placeholder-count="1">
                <div
                  style="grid-area:1/1;display:flex;flex-wrap:wrap;gap:5px;transition:opacity 300ms;opacity:{{ s.subOp }}"
                >
                  <sc-for list="{{ s.subs }}" as="sb" hint-placeholder-count="4"
                    ><span
                      style="font-size:11px;font-weight:700;padding:4px 10px;border-radius:999px;background:#2c2925;color:#f3f0ea;white-space:nowrap;transition:transform 500ms cubic-bezier(.2,.7,.2,1);transition-delay:{{ sb.delay }};transform:translateY({{ s.subX }})"
                      >{{ sb.t }}</span
                    ></sc-for
                  >
                </div>
              </sc-for>
            </div>
          </div>
        </div>

        <!-- page transition: two stacked panels -->
        <div
          ref="{{ curtainA }}"
          style="
            position: fixed;
            inset: 0;
            z-index: 100;
            background: #ff4d1f;
            transform: translateY(100%);
            pointer-events: none;
          "
        ></div>
        <div
          ref="{{ curtainB }}"
          style="
            position: fixed;
            inset: 0;
            z-index: 101;
            background: #141210;
            transform: translateY(100%);
            pointer-events: none;
            display: flex;
            align-items: center;
            justify-content: center;
          "
        >
          <span
            ref="{{ curtainLabel }}"
            style="
              font-family: &quot;Big Shoulders Display&quot;, sans-serif;
              font-weight: 900;
              text-transform: uppercase;
              font-size: clamp(3.5rem, 11vw, 10rem);
              color: #f3f0ea;
              line-height: 1;
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
{!! file_get_contents(public_path('js/pages/briefffly-v2.js')) !!}
</script>
@endsection
