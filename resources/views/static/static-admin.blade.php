<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Admin — Instagram Embed Manager</title>

  <!-- Bootstrap + Space Grotesk -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    /* =========================
       VARIABLES
       ========================= */
    :root{
      --radius: 14px;
      --t: 320ms cubic-bezier(.2,.9,.3,1);
      --neon-1: #7c5cff; /* purple */
      --neon-2: #00d4ff; /* cyan */
      --neon-3: #6ee7b7; /* green accent (subtle) */
      --glass-alpha: 0.06;
      --glass-2-alpha: 0.10;
      --muted: #98a2b3;
      --text: #e6eef8;
    }

    /* Dark theme by default */
    body { --bg-1: #06060a; --bg-2:#0b0f16; --card-bg: rgba(255,255,255,var(--glass-alpha)); --border: rgba(255,255,255,0.06); --text: #e6eef8; background: linear-gradient(180deg,var(--bg-1),var(--bg-2)); color:var(--text); }

    /* Light theme variables (applied via class .theme-light on body) */
    body.theme-light {
      --bg-1: #f6f8fb; --bg-2:#eef3fb;
      --card-bg: rgba(0,0,0,0.03); --border: rgba(0,0,0,0.08);
      --text: #0b1220; --muted: #61707f;
      background: linear-gradient(180deg,var(--bg-1),var(--bg-2));
    }

    /* Respect reduced motion */
    @media (prefers-reduced-motion: reduce){
      :root{ --t: 120ms linear; }
      * { transition-duration: 0ms !important; animation-duration: 0ms !important; animation-iteration-count: 1 !important; }
    }

    html,body{ height:100%; margin:0; font-family:'Space Grotesk', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; -webkit-font-smoothing:antialiased; -moz-osx-font-smoothing:grayscale; }

    /* =========================
       BACKGROUND GLOWS (neon blobs)
       ========================= */
    body::before, body::after{
      content:"";
      position:fixed; z-index:0; pointer-events:none; filter: blur(80px); opacity:0.5;
      mix-blend-mode: screen;
    }
    body::before{
      width:620px; height:620px; left:-160px; top:-120px;
      background: radial-gradient(circle at 30% 30%, rgba(124,92,255,0.18), transparent 35%);
      animation: floatA 14s ease-in-out infinite alternate;
    }
    body::after{
      width:520px; height:520px; right:-120px; bottom:-80px;
      background: radial-gradient(circle at 60% 40%, rgba(0,212,255,0.12), transparent 35%);
      animation: floatB 12s ease-in-out infinite alternate;
    }
    @keyframes floatA{ to{ transform: translate(120px,70px) rotate(8deg); } }
    @keyframes floatB{ to{ transform: translate(-100px,-60px) rotate(-6deg); } }

    /* =========================
       LAYOUT
       ========================= */
    .wrap { max-width:1180px; margin:44px auto; padding:28px; position:relative; z-index:2; }
    .topbar{ display:flex; align-items:center; justify-content:space-between; gap:16px; margin-bottom:28px; }
    .brand{ display:flex; align-items:center; gap:12px; }
    .logo{
      width:56px;height:56px;border-radius:12px;
      background: linear-gradient(135deg,var(--neon-1),var(--neon-2));
      display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:18px;
      box-shadow: 0 10px 36px rgba(124,92,255,0.12), inset 0 -6px 18px rgba(0,0,0,0.2);
    }
    .brand h1{ margin:0; font-size:20px; font-weight:700; letter-spacing:0.2px; }
    .brand p{ margin:0; font-size:13px; color:var(--muted); }

    .controls{ display:flex; align-items:center; gap:12px; }

    /* Search */
    .search{ display:flex; gap:8px; align-items:center; padding:8px 12px; border-radius:12px; background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(0,0,0,0.06)); border:1px solid var(--border); width:360px; max-width:40vw; }
    .search input{ border:0;background:transparent; outline:0;color:var(--text);font-size:14px; width:100%; }
    .search svg{ opacity:0.85; }

    /* Buttons */
    .btn-primary-modern{
      background: linear-gradient(90deg,var(--neon-1),var(--neon-2)); color:#fff; border:0; padding:10px 16px; border-radius:12px; font-weight:700; box-shadow: 0 10px 30px rgba(124,92,255,0.12);
      transition: transform var(--t), box-shadow var(--t);
    }
    .btn-primary-modern:hover{ transform: translateY(-4px); box-shadow: 0 18px 44px rgba(124,92,255,0.18); }

    .btn-ghost { background:transparent; border:1px solid var(--border); color:var(--text); padding:8px 12px; border-radius:10px; transition: transform var(--t); }
    .btn-ghost:hover{ transform: translateY(-3px); }

    /* =========================
       CARD: GLASS NEON
       ========================= */
    .card-post{
      position:relative; display:flex; gap:18px; border-radius:var(--radius);
      padding:18px; background: linear-gradient(180deg, rgba(255,255,255,var(--glass-alpha)), rgba(0,0,0,0.04));
      border:1px solid var(--border); box-shadow: 0 12px 40px rgba(2,6,23,0.6);
      overflow:hidden; transition: transform var(--t), box-shadow var(--t);
    }
    .card-post:hover{ transform: translateY(-8px); box-shadow: 0 26px 70px rgba(2,6,23,0.75); }

    /* accent strip + glow */
    .card-post::before{
      content:""; position:absolute; left:0; top:0; bottom:0; width:6px; border-top-left-radius:var(--radius); border-bottom-left-radius:var(--radius);
      background: linear-gradient(180deg,var(--neon-1),var(--neon-2));
      box-shadow: 0 6px 22px rgba(124,92,255,0.14);
      transform: translateX(-6px); transition: transform 420ms ease;
    }
    .card-post:hover::before{ transform: translateX(0); }

    /* sheen sweep */
    .card-post::after{
      content:""; position:absolute; top:0; left:-40%; width:140%; height:100%; background: linear-gradient(120deg, transparent, rgba(255,255,255,0.03), transparent); transform: translateX(-100%); transition: transform 900ms cubic-bezier(.2,.9,.3,1);
    }
    .card-post:hover::after{ transform: translateX(100%); }

    .card-body{ display:flex; gap:18px; align-items:flex-start; width:100%; flex-wrap:wrap; z-index:1; }

    .embed-wrap{
      flex: 1 1 62%; min-width:300px; max-width:720px;
      background: linear-gradient(180deg, rgba(0,0,0,0.18), rgba(0,0,0,0.08));
      border-radius:10px; padding:10px; display:flex; align-items:center; justify-content:center;
      transition: opacity var(--t), transform var(--t);
    }
    body.theme-light .embed-wrap{ background: rgba(255,255,255,0.85); }

    .embed-frame{ width:100%; border-radius:8px; overflow:hidden; }

    .meta{ flex:1 1 32%; min-width:220px; display:flex; flex-direction:column; gap:12px; align-items:flex-end; }
    .meta .title{ width:100%; text-align:left; }
    .meta h2{ margin:0; font-size:18px; font-weight:700; color:var(--text); }
    .meta .small-muted{ color:var(--muted); font-size:13px; }

    .actions{ display:flex; gap:8px; justify-content:flex-end; width:100%; }

    /* copy badge */
    .copy-badge{ color:var(--muted); font-size:13px; }

    /* loading state for embed until processed by instagram script or observer */
    .embed-wrap.loading{ opacity:0.04; transform: translateY(8px) scale(0.998); }
    .embed-wrap.loaded{ opacity:1; transform: translateY(0) scale(1); }

    /* responsive */
    @media (max-width:980px){
      .embed-wrap{ flex-basis:100%; }
      .meta{ flex-basis:100%; align-items:flex-start; }
      .search{ width:220px; }
    }

    footer{ margin-top:36px; color:var(--muted); text-align:center; font-size:13px; }
  </style>
</head>
<body>
  <div class="wrap">
    <!-- HEADER -->
    <div class="topbar" role="banner">
      <div class="brand">
        <div class="logo" aria-hidden="true">IG</div>
        <div>
          <h1>Admin — Instagram Embed Manager</h1>
          <p>glass neon UI • Space Grotesk</p>
        </div>
      </div>

      <div class="controls" role="navigation" aria-label="Kontrol">
        <div class="search" role="search" aria-label="Cari post">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M21 21l-4.35-4.35" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><circle cx="11" cy="11" r="5" stroke="currentColor" stroke-width="1.6"/></svg>
          <input id="search-input" type="search" placeholder="Cari judul atau ID..." autocomplete="off" />
        </div>

        <a href="{{ route('statics.create') }}" class="btn btn-primary-modern" aria-label="Tambah post">+ Tambah Post</a>

        <button id="theme-toggle" class="btn-ghost" aria-pressed="false" title="Ganti tema">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" style="vertical-align:middle"><path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </button>
      </div>
    </div>

    <!-- SESSION ALERTS -->
    @if (session('success'))
      <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif
    @if (session('error'))
      <div class="alert alert-danger mb-3">{{ session('error') }}</div>
    @endif

    <!-- LIST -->
    <main id="list-rows" aria-live="polite">
      @forelse ($statics as $index => $static)
        <article class="card-post mb-4" data-title="{{ strtolower($static->title ?? '') }}" aria-labelledby="post-title-{{ $static->id }}">
          <div class="card-body">
            <div class="embed-wrap loading" id="embed-wrap-{{ $static->id }}">
              <div class="embed-frame" role="region" aria-label="Instagram embed untuk {{ $static->title }}">
                {!! $static->embed_code !!}
              </div>
            </div>

            <aside class="meta" aria-hidden="false">
              <div class="title">
                <small class="small-muted">Post {{ $index + 1 }}</small>
                <h2 id="post-title-{{ $static->id }}">{{ $static->title ?? 'Tanpa judul' }}</h2>
                <div class="copy-badge">ID: {{ $static->id }}</div>
              </div>

              <div class="actions" role="group" aria-label="Aksi post">
                <a href="{{ route('statics.edit', $static->id) }}" class="btn-ghost" title="Edit">Edit</a>

                <button class="btn-ghost" data-copy-target="embed-wrap-{{ $static->id }}" title="Copy embed">Copy</button>

                <form id="delete-form-{{ $static->id }}" action="{{ route('statics.destroy', $static->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn-ghost text-danger btn-delete" data-form-id="delete-form-{{ $static->id }}">Hapus</button>
                </form>
              </div>

              <div style="width:100%; text-align:left;">
                <small class="small-muted">Terakhir: {{ $static->updated_at ?? $static->created_at }}</small>
              </div>
            </aside>
          </div>
        </article>
      @empty
        <div class="text-center small-muted py-6">Belum ada post. Klik Tambah Post untuk menambahkan embed Instagram.</div>
      @endforelse
    </main>

    <footer>&copy; {{ date('Y') }} — Instagram Embed Admin</footer>
  </div>

  <!-- DELETE CONFIRM MODAL -->
  <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius:12px; background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(0,0,0,0.03)); border:1px solid var(--border);">
        <div class="modal-body">
          <h5>Yakin ingin menghapus post?</h5>
          <p class="small-muted">Tindakan ini tidak dapat dikembalikan.</p>
          <div class="d-flex justify-content-end gap-2 mt-3">
            <button type="button" class="btn-ghost" data-bs-dismiss="modal">Batal</button>
            <button id="confirm-delete-btn" type="button" class="btn btn-danger">Hapus</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SCRIPTS -->
  <script async src="//www.instagram.com/embed.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // small helpers
    const $$ = s => Array.from(document.querySelectorAll(s));
    const $ = s => document.querySelector(s);

    // THEME TOGGLE (persistent + full variables)
    (function themeSetup(){
      const KEY = 'ig_glass_neon_theme';
      const body = document.body;
      const btn = document.getElementById('theme-toggle');
      const saved = localStorage.getItem(KEY);
      if(saved === 'light') body.classList.add('theme-light');
      else body.classList.remove('theme-light'); // default dark

      btn.addEventListener('click', () => {
        const nowLight = body.classList.toggle('theme-light');
        btn.setAttribute('aria-pressed', String(nowLight));
        localStorage.setItem(KEY, nowLight ? 'light' : 'dark');
        // small focus ring feedback
        btn.animate([{ transform: 'scale(1)' }, { transform: 'scale(0.98)' }, { transform: 'scale(1)' }], { duration: 240, easing: 'cubic-bezier(.2,.9,.3,1)' });
      });
    })();

    // LAZY PROCESS INSTAGRAM EMBEDS using IntersectionObserver
    (function lazyEmbeds(){
      const items = $$('.embed-wrap');
      if('IntersectionObserver' in window){
        const io = new IntersectionObserver((entries, obs) => {
          entries.forEach(e => {
            if(e.isIntersecting){
              const wrap = e.target;
              wrap.classList.remove('loading');
              wrap.classList.add('loaded');
              // try to process embeds
              if(window.instgrm && window.instgrm.Embeds && typeof window.instgrm.Embeds.process === 'function'){
                try { window.instgrm.Embeds.process(); } catch(err){ /* ignore */ }
              }
              obs.unobserve(wrap);
            }
          });
        }, { root:null, rootMargin: '200px', threshold: 0.12 });

        items.forEach(i => io.observe(i));
      } else {
        // fallback: process all
        items.forEach(i => i.classList.remove('loading'));
        if(window.instgrm && window.instgrm.Embeds) try{ window.instgrm.Embeds.process(); }catch(e){}
      }
    })();

    // COPY EMBED
    (function setupCopy(){
      document.addEventListener('click', (ev) => {
        const btn = ev.target.closest('[data-copy-target]');
        if(!btn) return;
        const id = btn.getAttribute('data-copy-target');
        const wrap = document.getElementById(id);
        if(!wrap) return;
        const html = wrap.querySelector('.embed-frame')?.innerHTML || '';
        if(!html) return alert('Tidak ada embed untuk di-copy.');
        navigator.clipboard.writeText(html).then(() => {
          const original = btn.innerHTML;
          btn.innerHTML = 'Copied';
          setTimeout(()=> btn.innerHTML = original, 1100);
        }).catch(() => alert('Gagal menyalin. Coba manual.'));
      });

      // also support buttons with text 'Copy'
      document.querySelectorAll('button').forEach(b=>{
        if(b.textContent.trim() === 'Copy') b.setAttribute('data-copy-target', b.closest('.card-post')?.querySelector('.embed-wrap')?.id || '');
      });
    })();

    // DELETE CONFIRMATION (modal)
    (function deleteFlow(){
      let formToSubmit = null;
      const modalEl = document.getElementById('confirmDeleteModal');
      const bsModal = new bootstrap.Modal(modalEl, { backdrop:'static', keyboard:false });
      const confirmBtn = document.getElementById('confirm-delete-btn');

      document.addEventListener('click', (ev) => {
        const del = ev.target.closest('.btn-delete');
        if(!del) return;
        const formId = del.getAttribute('data-form-id');
        formToSubmit = document.getElementById(formId);
        if(!formToSubmit) return;
        bsModal.show();
      });

      confirmBtn.addEventListener('click', () => {
        if(formToSubmit) formToSubmit.submit();
      });
    })();

    // CLIENT-SIDE SEARCH
    (function clientSearch(){
      const input = document.getElementById('search-input');
      if(!input) return;
      input.addEventListener('input', () => {
        const q = input.value.trim().toLowerCase();
        $$('.card-post').forEach(card => {
          const title = card.getAttribute('data-title') || '';
          card.style.display = (q === '' || title.includes(q)) ? '' : 'none';
        });
      });
    })();

    // Ensure instgrm processed after load (fallback)
    window.addEventListener('load', () => {
      setTimeout(() => { if(window.instgrm && window.instgrm.Embeds) try{ window.instgrm.Embeds.process(); }catch(e){} }, 700);
    });
  </script>
</body>
</html>
