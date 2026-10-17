<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AI Use Disclosure | Antonio Michele Miti</title>
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../src/style.css">
    <link rel="stylesheet" href="../src/darkmode.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa&amp;display=swap" rel="stylesheet">
    <style>
      /* Reuse the academic site's typography, headings and introduction layout. */
      .ai-declaration .sec p { display: block; margin: 10px 0; }
      .ai-declaration #desc { flex: 1; min-width: 0; }
      .ai-declaration #photo { flex: 0 0 400px; width: 400px; max-width: 100%; }
      .ai-declaration .big-title { box-sizing: border-box; max-width: 100%; width: fit-content; }
      .ai-declaration blockquote { margin: 20px 0; padding: 4px 20px; }
      .ai-declaration pre { overflow-x: auto; white-space: pre-wrap; overflow-wrap: anywhere; padding: 16px; }
      .ai-declaration code { font-family: monospace; }
      .ai-declaration summary { cursor: pointer; margin: 10px 0; }
      .ai-declaration [id] { scroll-margin-top: 90px; }
      .ai-declaration :target { padding-top: 0; }
      @media (max-width: 950px) {
        .ai-declaration #photo { flex: none; }
      }
      @media (max-width: 520px) {
        .ai-declaration .big-title { width: 100%; }
      }
    </style>
  </head>
  <body>
    <header>
      <div id="header-container">
        <label for="nav"></label>
        <input id="nav" type="checkbox"><a id="logo" href="../">Antonio Michele MITI</a>
        <nav><ul>
          <li><a href="../research/">RESEARCH</a></li>
          <li><a href="../teaching/">TEACHING</a></li>
          <li><a href="../#contacts">CONTACTS</a></li>
        </ul></nav>
      </div>
    </header>
    <main id="content">
      <div id="content-container" class="ai-declaration">
        <div id="subpage-title"><h1>AI Use Disclosure</h1></div>

        <div id="introduction">
          <div id="desc">
            <p>I am currently reflecting on my personal AI policies and experimenting cautiously with AI tools. The current zeitgeist raises ethical questions for which I find no obvious answers.</p>
            <p>I am learning from mistakes I intend to correct and avoid repeating: overreliance on AI-generated paragraphs and emails, and insufficient control over access to my working folders.</p>
            <p><strong>Feedback.</strong> I welcome criticism and suggestions <a href="mailto:antoniomichele.miti@uniroma1.it">by email</a>.</p>
            <p><em>Work in progress. Last updated: <?php echo date("d F Y", filemtime(__FILE__)); ?>.</em></p>
          </div>
          <div id="photo"><img src="tony-robot-chess.png" width="1448" height="1086" alt="Cartoon of Tony, on the left, looking quizzically at a chessboard opposite a robot with a Bash terminal for a head; both share a thought bubble with a question mark."></div>
        </div>

        <section class="sec" aria-labelledby="scattered-observations">
          <h2 class="sec-title" id="scattered-observations">Scattered observations</h2>
          <ol class="observations-list">
            <li><strong>Everything here is tentative.</strong> These policies will evolve through experimentation, reflection, and discussion.</li>
            <li><strong>The attention economy.</strong> Attention has become a commodity alongside gold, money, oil, and data. I often find AI-generated text verbose but thin on meaning, wasting the attention it asks of readers. (The current style of this page suffers from the same problem.)</li>
            <li>This page and its illustration were created through interactive prompting in Codex (app version 26.1013.40934), using OpenAI's image generation tool and my portrait for the illustration.</li>
          </ol>
        </section>

        <section class="sec" aria-labelledby="general-policy">
          <h2 class="big-title shaded" id="general-policy">General policy</h2>
          <p><strong>General goals.</strong> Write faster, reduce proofreading effort, and focus on ideas rather than LaTeX typesetting.</p>
          <p>Inspired by the <a href="https://www.mpim-bonn.mpg.de/node/3888">AI policy of the Max Planck Institute for Mathematics</a>, adapted to my own practice.</p>
          <ul>
            <li><strong>Human interaction.</strong> Discussion and independent understanding are central to my mathematical work.</li>
            <li><strong><a href="https://leidendeclaration.ai/">Leiden Declaration.</a></strong> I support its principles and intend to follow them.</li>
            <li><strong>Respect for colleagues.</strong> I respect responsible AI use and colleagues who work without it; that choice should remain possible and valued.</li>
            <li><strong>Transparency.</strong> I intend to disclose the extent of language editing, technical assistance, and exploratory AI use.</li>
            <li><strong>Confidentiality.</strong> I will not use AI to evaluate applications or confidential work, or share confidential material or others' unpublished work with AI tools.</li>
            <li><strong>Responsibility.</strong> I remain responsible for my work and intend to correct errors and reconsider the practices behind them.</li>
          </ul>
          <p>Sadly, these are standards I am working towards and have not always met. Stricter requirements from collaborators, journals, institutions, or funders take precedence.</p>
        </section>

        <section class="sec policy-index" role="navigation" aria-labelledby="policy-index">
          <h2 class="sec-title" id="policy-index">Policy index</h2>
          <ol>
            <li><a href="#mathematical-writing">Mathematical and technical writing</a></li>
            <li><a href="#grant-writing">Grant writing and academic administration</a></li>
            <li><a href="#email-writing">Email writing</a></li>
            <li><a href="#code-writing">Code writing and access to files</a></li>
            <li><a href="#website">Website</a></li>
          </ol>
        </section>

        <section class="sec" aria-labelledby="mathematical-writing">
          <h2 class="big-title shaded" id="mathematical-writing">Mathematical and technical writing</h2>
          <ul>
            <li><strong>Use.</strong> Language editing and minor LaTeX adjustments.</li>
            <li><strong>Limits.</strong> No AI contribution to mathematical content.</li>
            <li><strong>Checks.</strong> I check changes to notation and formulae against the intended mathematics.</li>
          </ul>
          <p>Disclosure for manuscripts prepared within these limits:</p>
          <blockquote><p>AI tools were used solely for language editing and minor LaTeX adjustments. AI did not contribute to any mathematical elaboration, including the formulation of definitions, conjectures, arguments, proofs, or results. All mathematical content is the authors' own work. The authors reviewed all changes and take full responsibility for the final manuscript.</p></blockquote>
          <details><summary>LaTeX disclosure snippet</summary><pre><code>\paragraph{Disclosure of AI use.}
AI tools were used solely for language editing and minor LaTeX adjustments.
AI did not contribute to any mathematical elaboration, including the
formulation of definitions, conjectures, arguments, proofs, or results.
All mathematical content is the authors' own work. The authors reviewed
all changes and take full responsibility for the final manuscript.</code></pre></details>
        </section>

        <section class="sec" aria-labelledby="grant-writing">
          <h2 class="big-title shaded" id="grant-writing">Grant writing and academic administration</h2>
          <ul>
            <li><strong>Use.</strong> Organising application material, administrative drafting, formatting, and language editing; marginal speculative brainstorming for research proposals.</li>
            <li><strong>Limits.</strong> The research programme, mathematical formulation, priorities, and feasibility assessment remain mine. I follow any requirement for AI-free research statements.</li>
            <li><strong>Checks.</strong> I scrutinise suggestions independently and verify calls, eligibility, deadlines, budgets, and institutional requirements against original sources.</li>
          </ul>
          <p>Disclosure when it accurately describes the proposal's preparation:</p>
          <blockquote><p>AI tools were used for language editing and, to a marginal extent, for speculative brainstorming during the preparation of this proposal. Their use did not replace independent scientific judgement: the research programme, mathematical formulation, and assessment of feasibility were developed autonomously by the applicant. The applicant critically reviewed all AI-assisted material and retains full scientific responsibility for the proposal.</p></blockquote>
          <details><summary>LaTeX disclosure snippet</summary><pre><code>\paragraph{Disclosure of AI use.}
AI tools were used for language editing and, to a marginal extent, for
speculative brainstorming during the preparation of this proposal.
Their use did not replace independent scientific judgement: the research
programme, mathematical formulation, and assessment of feasibility were
developed autonomously by the applicant. The applicant critically reviewed
all AI-assisted material and retains full scientific responsibility
for the proposal.</code></pre></details>
        </section>

        <section class="sec" aria-labelledby="email-writing">
          <h2 class="big-title shaded" id="email-writing">Email writing</h2>
          <ul>
            <li><strong>Use.</strong> Language editing or help formulating emails from points I have chosen.</li>
            <li><strong>Limits.</strong> Sharing personal or confidential correspondence requires an appropriate basis.</li>
            <li><strong>Checks.</strong> I intend to check every message before sending, including its facts, tone, commitments, and implications for the recipient.</li>
          </ul>
          <p>Disclosure for language editing only:</p>
          <blockquote><p><strong>AI-use transparency.</strong> This message was written by the author, not generated by an AI language model. AI-powered tools may have been used for grammar checking and linguistic refinement. The author retains full responsibility for its content.</p></blockquote>
        </section>

        <section class="sec" aria-labelledby="code-writing">
          <h2 class="big-title shaded" id="code-writing">Code writing and access to files</h2>
          <p>I may use AI to write, understand, debug, and maintain code. I currently treat LLMs as assistants I have little trust in, but allow them to create commits in my repositories.</p>
          <p><strong>Checks.</strong> Changes require review and checks appropriate to their purpose; for scientific code, the mathematical model and interpretation of results remain my responsibility.</p>
          <p><strong>Commit provenance.</strong> I use these tags to distinguish contributions:</p>
          <ul>
            <li><code>[AI]</code>: predominantly AI-generated content (about 90% AI).</li>
            <li><code>[AI-Human]</code>: content developed through an interactive process between me and an AI.</li>
            <li><code>No tag</code>: content classified as human-authored.</li>
          </ul>
          <p>I find it useful to distinguish human and machine contributions, including collaborative work; see <a href="https://www.ilsaggiatore.com/libro/non-siamo-mai-stati-sulla-terra"><cite>Non siamo mai stati sulla Terra</cite></a>, a human–AI dialogue by Rocco Tanica and Out0mat-B13.</p>
          <p><strong>File access.</strong> I intend to limit access to each task's needs and preserve recoverable versions of my work.</p>
        </section>

        <section class="sec" aria-labelledby="website">
          <h2 class="big-title shaded" id="website">Website</h2>
          <blockquote><p>AI tools may have assisted with language editing and with the HTML/PHP code of this website. I review the published material and take full responsibility for its content.</p></blockquote>
          <p><a href="https://github.com/MasterToninus/MasterToninus.github.io/tree/aruba">Website source on GitHub — aruba branch</a>.</p>
        </section>

      </div>
    </main>
    <footer class="academic-footer">
      <div class="academic-footer-row">
        <div class="poweredby academic-footer-meta">
          <div class="academic-footer-credits">
            <a class="academic-footer-ai" href="./">Ai Disclosure</a>
          </div>
          <?php echo "Last update: ".date("F d Y H:i:s.", filemtime(__FILE__)); ?>
          <br>
          Copyright &copy;2016<script>new Date().getFullYear()>2016&&document.write("-"+new Date().getFullYear());</script>,
          &emsp; Italsing srl. &emsp; All Rights Reserved.
        </div>
      </div>
    </footer>
  </body>
</html>
