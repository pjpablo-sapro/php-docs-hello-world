<?php
declare(strict_types=1);
// Cute Chihuahuas — Hi Jasmine (PHP 8.2 compatible)
// Single‑file static site that renders HTML/CSS/JS and pulls data from PHP arrays.

$facts = [
  "Chihuahuas are one of the oldest toy breeds and take their name from the state of Chihuahua in Mexico.",
  "They come in two coat types: smooth (short) and long.",
  "Typical adult weight is about 1.5–3 kg; they often live 12–20 years.",
  "Two common head shapes are described: apple‑head and deer‑head.",
  "Because of their size, they can excel at trick training and nose work indoors.",
];

$gallery = [
  [
    'src' => 'https://upload.wikimedia.org/wikipedia/commons/3/3d/Chihuahua%28short_hair%29.jpg',
    'alt' => 'Short‑haired (smooth coat) Chihuahua looking up',
    'tag' => 'Smooth coat',
    'credit' => 'Wikimedia Commons — CC BY‑SA 3.0',
    'href' => 'https://commons.wikimedia.org/wiki/File:Chihuahua(short_hair).jpg',
  ],
  [
    'src' => 'https://upload.wikimedia.org/wikipedia/commons/e/eb/Chihuahua_long-haired_portrait.jpg',
    'alt' => 'Long‑haired Chihuahua portrait',
    'tag' => 'Long coat',
    'credit' => 'Wikimedia Commons — CC BY 2.0',
    'href' => 'https://commons.wikimedia.org/wiki/File:Chihuahua_long-haired_portrait.jpg',
  ],
  [
    'src' => 'https://upload.wikimedia.org/wikipedia/commons/3/31/Apple_Head_Chihuahua.jpg',
    'alt' => 'Apple‑head Chihuahua sitting',
    'tag' => 'Apple‑head',
    'credit' => 'Wikimedia Commons — CC BY‑SA 4.0',
    'href' => 'https://commons.wikimedia.org/wiki/File:Apple_Head_Chihuahua.jpg',
  ],
  [
    'src' => 'https://upload.wikimedia.org/wikipedia/commons/f/f7/Chihuahua_long-haired_red_sable.jpg',
    'alt' => 'Long‑haired red sable Chihuahua outdoors',
    'tag' => 'Red sable',
    'credit' => 'Wikimedia Commons — CC BY‑SA 4.0',
    'href' => 'https://commons.wikimedia.org/wiki/File:Chihuahua_long-haired_red_sable.jpg',
  ],
  [
    'src' => 'https://upload.wikimedia.org/wikipedia/commons/5/58/Chihuahua_dog.jpg',
    'alt' => 'Tiny white Chihuahua puppy on the beach with a red harness',
    'tag' => 'Puppy',
    'credit' => 'Wikimedia Commons — Public Domain',
    'href' => 'https://commons.wikimedia.org/wiki/File:Chihuahua_dog.jpg',
  ],
];

$quiz = [
  [
    'q' => 'Which country is most associated with the Chihuahua breed name?',
    'choices' => ['Spain', 'Mexico', 'Peru', 'Italy'],
    'answer' => 1,
  ],
  [
    'q' => 'Which is NOT a common coat type for Chihuahuas?',
    'choices' => ['Smooth (short)', 'Wire‑haired', 'Long‑haired'],
    'answer' => 1,
  ],
  [
    'q' => 'Which description is often used for Chihuahua head shapes?',
    'choices' => ['Block‑head & wedge‑head', 'Apple‑head & deer‑head', 'Square‑head & oval‑head', 'Round‑head & fox‑head'],
    'answer' => 1,
  ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Hi Jasmine • Cute Chihuahuas</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    :root{
      --bg:#fff7fb; --card:#ffffff; --text:#2c2333; --muted:#6d5d77; --brand:#ff7eb6; --brand2:#ffd1e8; --accent:#ffd166; --chip:#ffe6f3; --shadow:0 10px 30px rgba(255,126,182,.25); --radius:20px;
    }
    .dark{ --bg:#1b1420; --card:#271e2e; --text:#efe7f5; --muted:#c7b8d7; --brand:#ff7eb6; --brand2:#3a283f; --accent:#ffd166; --chip:#3b2a41; --shadow:0 10px 30px rgba(0,0,0,.45); }
    *{box-sizing:border-box}
    body{margin:0;background:var(--bg);color:var(--text);font-family:'Quicksand',system-ui,Segoe UI,Roboto,sans-serif;line-height:1.6}
    header{position:sticky;top:0;z-index:50;backdrop-filter:blur(8px);background:color-mix(in oklab,var(--bg) 85%, white 15%);border-bottom:1px solid color-mix(in oklab,var(--brand) 20%, transparent)}
    .nav{max-width:1100px;margin:0 auto;display:flex;align-items:center;gap:14px;padding:14px 18px}
    .logo{display:flex;align-items:center;gap:12px;text-decoration:none;color:var(--text)}
    .pup{width:42px;height:42px}
    .nav a.jump{padding:8px 12px;border-radius:999px;text-decoration:none;color:var(--text)}
    .nav a.jump:hover{background:var(--brand2)}
    .spacer{flex:1}
    .btn{cursor:pointer;border:none;border-radius:999px;padding:10px 14px;font-weight:700}
    .btn-primary{background:var(--brand);color:#fff;box-shadow:var(--shadow)}
    .btn-ghost{background:transparent;color:var(--text);border:1px solid color-mix(in oklab,var(--text) 20%, transparent)}

    main{max-width:1100px;margin:26px auto 80px;padding:0 18px}
    .hero{display:grid;grid-template-columns:1.2fr .8fr;gap:22px;align-items:center}
    .hero-card{background:var(--card);border-radius:var(--radius);box-shadow:var(--shadow);padding:28px;position:relative;overflow:hidden}
    .badge{display:inline-flex;align-items:center;gap:8px;background:var(--brand2);color:var(--text);padding:6px 10px;border-radius:999px;font-weight:700;font-size:.9rem}
    h1.big{font-family:'Pacifico',cursive;letter-spacing:.5px;font-size:clamp(2.4rem,4vw+1.2rem,5rem);margin:.3em 0 .2em;color:var(--text)}
    h1.big .grad{background:linear-gradient(90deg,var(--brand),var(--accent));-webkit-background-clip:text;background-clip:text;color:transparent}
    p.lead{font-size:1.1rem;color:var(--muted);margin-top:0}
    .chips{display:flex;flex-wrap:wrap;gap:10px;margin:16px 0 22px}
    .chip{background:var(--chip);padding:7px 11px;border-radius:999px;font-weight:700;font-size:.9rem}

    .grid{display:grid;grid-template-columns:repeat(12,1fr);gap:16px}
    .col-6{grid-column:span 6}.col-12{grid-column:span 12}
    .card{background:var(--card);border-radius:var(--radius);box-shadow:var(--shadow);padding:18px}

    .gallery{display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:14px}
    .tile{background:var(--card);border-radius:18px;overflow:hidden;box-shadow:var(--shadow);position:relative}
    .tile img{width:100%;height:180px;object-fit:cover;display:block}
    .tile .info{padding:12px;display:flex;align-items:center;justify-content:space-between;gap:8px}
    .tile .tag{background:var(--brand2);padding:4px 8px;border-radius:999px;font-size:.8rem;font-weight:700}
    .tile .like{position:absolute;top:8px;right:8px;background:white;border:none;border-radius:999px;padding:6px 8px;cursor:pointer;box-shadow:var(--shadow)}

    details.accordion summary{cursor:pointer;list-style:none}
    details.accordion{background:var(--card);border-radius:14px;box-shadow:var(--shadow);padding:14px 16px}
    details.accordion+details.accordion{margin-top:10px}

    .lightbox{position:fixed;inset:0;background:rgba(0,0,0,.6);display:none;align-items:center;justify-content:center;padding:18px}
    .lightbox.open{display:flex}
    .lightbox .panel{background:var(--card);color:var(--text);border-radius:18px;max-width:min(1000px,92vw);width:100%;box-shadow:var(--shadow);overflow:hidden}
    .lightbox header{position:relative;background:var(--brand);color:#fff;padding:12px 16px;border-bottom:none}
    .lightbox .content{padding:16px}
    .close-x{position:absolute;right:10px;top:8px;font-size:1.4rem;cursor:pointer;background:transparent;border:none;color:#fff}

    footer{margin-top:60px;padding:28px 18px;text-align:center;color:var(--muted)}
    .switch{display:inline-flex;align-items:center;gap:8px}
    .switch input{appearance:none;width:46px;height:26px;border-radius:999px;background:var(--brand2);position:relative;outline:none;cursor:pointer;transition:background .2s ease}
    .switch input:checked{background:var(--brand)}
    .switch input::after{content:"";position:absolute;width:22px;height:22px;border-radius:50%;background:#fff;top:2px;left:2px;transition:left .2s ease;box-shadow:var(--shadow)}
    .switch input:checked::after{left:22px}

    @media (max-width: 900px){.hero{grid-template-columns:1fr}.col-6{grid-column:span 12}}
  </style>
</head>
<body>
  <header>
    <nav class="nav">
      <a class="logo" href="#top" aria-label="Go to top">
        <svg class="pup" viewBox="0 0 64 64" aria-hidden="true">
          <circle cx="32" cy="32" r="30" fill="#ff7eb6"/>
          <ellipse cx="22" cy="18" rx="10" ry="14" fill="#ffd1e8"/>
          <ellipse cx="42" cy="18" rx="10" ry="14" fill="#ffd1e8"/>
          <circle cx="26" cy="30" r="4" fill="#2c2333"/>
          <circle cx="38" cy="30" r="4" fill="#2c2333"/>
          <path d="M32 38c4 0 8 2 8 5H24c0-3 4-5 8-5Z" fill="#2c2333"/>
        </svg>
        <strong>Chihuahua Info</strong>
      </a>
      <div class="spacer"></div>
      <a class="jump" href="#about">About</a>
      <a class="jump" href="#care">Care</a>
      <a class="jump" href="#types">Types</a>
      <a class="jump" href="#gallery">Gallery</a>
      <a class="jump" href="#quiz">Quiz</a>
      <label class="switch" title="Toggle dark mode"><span aria-hidden="true">☀️</span>
        <input id="modeToggle" type="checkbox" />
        <span aria-hidden="true">🌙</span>
      </label>
    </nav>
  </header>

  <main id="top">
    <section class="hero" aria-labelledby="hero-title">
      <div class="hero-card">
        <span class="badge">🐶 Tiny dog, giant heart</span>
        <h1 id="hero-title" class="big">Hi <span class="grad">Jasmine</span></h1>
        <p class="lead">Chihuahuas are the smallest dog breed in the world, famous for their big personalities, expressive ears, and loyal hearts. This mini‑site is packed with cute art, quick facts, care tips, an image gallery, and a fun quiz—click around!</p>
        <div class="chips" aria-label="Quick breed facts">
          <span class="chip">Origin: Mexico 🇲🇽</span>
          <span class="chip">Lifespan: 12–20 yrs</span>
          <span class="chip">Weight: 1.5–3 kg</span>
          <span class="chip">Coats: Smooth / Long</span>
        </div>
        <div class="cta">
          <button class="btn btn-primary" id="randomFactBtn">🎲 Random fun fact</button>
          <a class="btn btn-ghost" href="#gallery">See the gallery ↓</a>
        </div>
      </div>
      <div class="hero-card" aria-hidden="true">
        <!-- Cute inline SVG illustration of a Chihuahua -->
        <svg class="svg-pup" viewBox="0 0 400 320" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;display:block">
          <defs><linearGradient id="fur" x1="0" x2="1"><stop offset="0%" stop-color="#ffd1a6"/><stop offset="100%" stop-color="#ffb28e"/></linearGradient></defs>
          <path d="M60,40 C40,10 20,10 10,60 C0,120 60,130 90,90 Z" fill="#ffb7d3"/>
          <path d="M340,40 C360,10 380,10 390,60 C400,120 340,130 310,90 Z" fill="#ffb7d3"/>
          <ellipse cx="200" cy="120" rx="120" ry="95" fill="url(#fur)"/>
          <circle cx="160" cy="120" r="16" fill="#2c2333"/>
          <circle cx="240" cy="120" r="16" fill="#2c2333"/>
          <circle cx="155" cy="118" r="4" fill="#fff"/>
          <circle cx="235" cy="118" r="4" fill="#fff"/>
          <ellipse cx="200" cy="150" rx="10" ry="7" fill="#2c2333"/>
          <path d="M180,160 Q200,175 220,160" stroke="#2c2333" stroke-width="5" fill="none" stroke-linecap="round"/>
          <ellipse cx="200" cy="230" rx="140" ry="70" fill="url(#fur)"/>
          <rect x="120" y="165" width="160" height="20" rx="10" fill="#ff7eb6"/>
          <circle cx="200" cy="175" r="6" fill="#ffd166"/>
          <path d="M320,210 q60,-40 20,20" stroke="#ffb28e" stroke-width="16" fill="none" stroke-linecap="round"/>
          <ellipse cx="130" cy="275" rx="22" ry="14" fill="#ffb28e"/>
          <ellipse cx="270" cy="275" rx="22" ry="14" fill="#ffb28e"/>
        </svg>
      </div>
    </section>

    <section id="about">
      <div class="grid">
        <div class="col-6 card">
          <h2>About the Breed</h2>
          <p class="muted">Named after the Mexican state of Chihuahua, these tiny dogs are known for being alert, loyal, and full of energy. They bond closely with their favorite humans and make excellent apartment companions when properly trained and socialized.</p>
          <ul>
            <li><strong>Size:</strong> 15–23 cm tall, 1.5–3 kg average</li>
            <li><strong>Coats:</strong> Smooth (short) or Long</li>
            <li><strong>Colors:</strong> Fawn, black, white, chocolate, cream, and more</li>
            <li><strong>Head types:</strong> Apple‑head (rounded) and Deer‑head (longer muzzle)</li>
          </ul>
        </div>
        <div class="col-6 card">
          <h2>Temperament & Training</h2>
          <p class="muted">Big‑dog attitude in a tiny frame! Early socialization keeps them confident rather than yappy. Use gentle, positive reinforcement and short, fun sessions.</p>
          <ul>
            <li>Daily mental play (snuffle mats, nose work) keeps them happy</li>
            <li>Set consistent rules to avoid “small‑dog syndrome”</li>
            <li>Great for clicker training and trick routines</li>
          </ul>
        </div>
      </div>
    </section>

    <section id="care">
      <h2>Care Guide</h2>
      <details class="accordion"><summary><strong>Health</strong> — common things to watch</summary>
        <ul>
          <li>Dental care is crucial — brush 3–4×/week to prevent tartar.</li>
          <li>Use a <strong>harness</strong> instead of a collar to protect the trachea.</li>
          <li>They can be sensitive to cold — sweaters are both cute and useful.</li>
        </ul>
      </details>
      <details class="accordion"><summary><strong>Nutrition</strong> — tiny dog, tiny portions</summary>
        <ul>
          <li>Feed measured meals; watch weight to avoid joint stress.</li>
          <li>Ask a vet about small‑breed formulas and dental chews.</li>
        </ul>
      </details>
      <details class="accordion"><summary><strong>Exercise</strong> — zoomies + enrichment</summary>
        <ul>
          <li>Short daily walks and indoor play are usually enough.</li>
          <li>Try puzzle feeders and hide‑and‑seek treats for mental work.</li>
        </ul>
      </details>
    </section>

    <section id="types">
      <h2>Types at a Glance</h2>
      <div class="chips">
        <span class="chip">Smooth (short) coat</span>
        <span class="chip">Long‑haired coat</span>
        <span class="chip">Apple‑head</span>
        <span class="chip">Deer‑head</span>
      </div>
    </section>

    <section id="gallery">
      <h2>Gallery</h2>
      <div class="gallery">
        <?php foreach ($gallery as $i => $g): ?>
          <figure class="tile">
            <button class="like" aria-label="Like photo" onclick="this.textContent = this.textContent==='❤' ? '♡' : '❤'">♡</button>
            <img src="<?= htmlspecialchars($g['src']) ?>" alt="<?= htmlspecialchars($g['alt']) ?>" loading="lazy" data-index="<?= $i ?>" onclick="openLightbox(<?= $i ?>)"/>
            <figcaption class="info">
              <span class="tag"><?= htmlspecialchars($g['tag']) ?></span>
              <a href="<?= htmlspecialchars($g['href']) ?>" target="_blank" rel="noopener">Credit</a>
            </figcaption>
          </figure>
        <?php endforeach; ?>
      </div>
    </section>

    <section id="quiz">
      <h2>Quick Quiz</h2>
      <form id="quizForm" class="card" onsubmit="return gradeQuiz(event)">
        <?php foreach ($quiz as $qi => $q): ?>
          <fieldset style="margin:0 0 14px;padding:0;border:0">
            <legend style="font-weight:800;margin-bottom:8px">Q<?= $qi+1 ?>. <?= htmlspecialchars($q['q']) ?></legend>
            <?php foreach ($q['choices'] as $ci => $choice): $id = 'q'.$qi.'c'.$ci; ?>
              <div style="display:flex;align-items:center;gap:8px;margin:6px 0">
                <input type="radio" name="q<?= $qi ?>" id="<?= $id ?>" value="<?= $ci ?>">
                <label for="<?= $id ?>"><?= htmlspecialchars($choice) ?></label>
              </div>
            <?php endforeach; ?>
          </fieldset>
        <?php endforeach; ?>
        <button class="btn btn-primary" type="submit">Check answers</button>
        <button class="btn btn-ghost" type="button" onclick="this.form.reset();document.getElementById('quizResult').textContent=''">Reset</button>
        <p id="quizResult" class="muted" style="margin-top:10px"></p>
      </form>
    </section>

    <section>
      <h2>Fun Facts</h2>
      <div id="factBox" class="card" role="status" aria-live="polite">Tap “Random fun fact” to get started!</div>
    </section>

    <div id="lightbox" class="lightbox" role="dialog" aria-modal="true" aria-label="Image viewer">
      <div class="panel">
        <header>
          <strong>Chihuahua photo</strong>
          <button class="close-x" onclick="closeLightbox()" aria-label="Close">✕</button>
        </header>
        <div class="content">
          <img id="lbImg" src="" alt="" style="width:100%;height:auto;display:block"/>
          <p style="margin:.6rem 0 0" class="muted"><a id="lbCredit" href="#" target="_blank" rel="noopener">Image credit</a></p>
        </div>
      </div>
    </div>
  </main>

  <footer>
    <p>Made with 💗 for Jasmine • Images credit: Wikimedia Commons contributors (see individual credits).</p>
    <p><button class="btn btn-ghost" onclick="scrollTo(0,0)">Back to top ↑</button></p>
  </footer>

  <script>
    const facts = <?php echo json_encode($facts, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;
    const gallery = <?php echo json_encode($gallery, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;

    // Dark mode toggle
    const modeToggle = document.getElementById('modeToggle');
    const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
    if (prefersDark) { document.documentElement.classList.add('dark'); modeToggle.checked = true; }
    modeToggle.addEventListener('change', () => {
      document.documentElement.classList.toggle('dark', modeToggle.checked);
    });

    // Random fact button
    document.getElementById('randomFactBtn').addEventListener('click', () => {
      const box = document.getElementById('factBox');
      const fact = facts[Math.floor(Math.random() * facts.length)];
      box.textContent = fact;
    });

    // Lightbox helpers
    function openLightbox(index){
      const item = gallery[index];
      const lb = document.getElementById('lightbox');
      document.getElementById('lbImg').src = item.src;
      document.getElementById('lbImg').alt = item.alt;
      const credit = document.getElementById('lbCredit');
      credit.href = item.href; credit.textContent = item.credit;
      lb.classList.add('open');
    }
    function closeLightbox(){ document.getElementById('lightbox').classList.remove('open'); }
    window.openLightbox = openLightbox; window.closeLightbox = closeLightbox;

    // Quiz grading
    function gradeQuiz(e){
      e.preventDefault();
      const answers = <?php echo json_encode(array_column($quiz, 'answer'), JSON_UNESCAPED_UNICODE); ?>;
      let score = 0; let total = answers.length;
      answers.forEach((ans, i) => {
        const chosen = document.querySelector(`input[name="q${i}"]:checked`);
        if (chosen && Number(chosen.value) === Number(ans)) score++;
      });
      const msg = `You scored ${score}/${total} ${score===total ? '🎉 Paw‑fect!' : score>=Math.ceil(total/2) ? '🐾 Nice job!' : '💡 Try again!'} `;
      document.getElementById('quizResult').textContent = msg;
      return false;
    }
    window.gradeQuiz = gradeQuiz;
  </script>
</body>
</html>
