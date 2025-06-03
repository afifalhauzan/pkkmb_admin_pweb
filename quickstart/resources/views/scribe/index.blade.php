<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "https://pkkmbadmin.vercel.app";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.2.1.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.2.1.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-mahasiswa-listtugas">
                                <a href="#endpoints-GETapi-mahasiswa-listtugas">GET api/mahasiswa/listtugas</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-kegiatan">
                                <a href="#endpoints-GETapi-kegiatan">GET api/kegiatan</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-mahasiswa--nim-">
                                <a href="#endpoints-GETapi-mahasiswa--nim-">GET api/mahasiswa/{nim}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-tugas-status--nim---id_tugas-">
                                <a href="#endpoints-GETapi-tugas-status--nim---id_tugas-">GET api/tugas/status/{nim}/{id_tugas}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-tugas-submit--nim---taskId---submissionLink-">
                                <a href="#endpoints-POSTapi-tugas-submit--nim---taskId---submissionLink-">POST api/tugas/submit/{nim}/{taskId}/{submissionLink}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-presensi-submit--nim---kode_presensi-">
                                <a href="#endpoints-POSTapi-presensi-submit--nim---kode_presensi-">POST api/presensi/submit/{nim}/{kode_presensi}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-tugas-update--nim---id_tugas-">
                                <a href="#endpoints-PUTapi-tugas-update--nim---id_tugas-">PUT api/tugas/update/{nim}/{id_tugas}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-users">
                                <a href="#endpoints-GETapi-users">GET api/users</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-mahasiswa-rekap-kehadiran--nim-">
                                <a href="#endpoints-GETapi-mahasiswa-rekap-kehadiran--nim-">GET api/mahasiswa/rekap-kehadiran/{nim}</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: June 3, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>https://pkkmbadmin.vercel.app</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-mahasiswa-listtugas">GET api/mahasiswa/listtugas</h2>

<p>
</p>



<span id="example-requests-GETapi-mahasiswa-listtugas">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://pkkmbadmin.vercel.app/api/mahasiswa/listtugas" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://pkkmbadmin.vercel.app/api/mahasiswa/listtugas"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-mahasiswa-listtugas">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;ID_Tugas&quot;: 1,
            &quot;Judul&quot;: &quot;Tugas 1: Professional Ventures&quot;,
            &quot;Deskripsi&quot;: &quot;Bangun langkah awal menuju karier profesionalmu dengan membuat akun LinkedIn yang menarik! Di tugas ini, kamu akan membuat profil LinkedIn yang mencerminkan minat dan tujuanmu. Lengkapi profil dengan foto formal, deskripsi singkat tentang dirimu, serta pencapaian yang kamu miliki. Selain itu, eksplorasi jaringan profesional di bidang yang kamu minati dengan mengikuti perusahaan, komunitas, atau figur inspiratif. LinkedIn adalah tempat untuk memperluas wawasan dan membangun relasi yang mendukung perjalanan akademik dan kariermu ke depan.&quot;
        },
        {
            &quot;ID_Tugas&quot;: 2,
            &quot;Judul&quot;: &quot;Tugas 2: Chapter of Creativity&quot;,
            &quot;Deskripsi&quot;: &quot;Saatnya menunjukkan siapa dirimu! Buatlah video berdurasi 2-3 menit yang menceritakan minat, bakat, dan rencana perkuliahanmu. Video ini bisa berisi tentang apa yang membuatmu bersemangat, keterampilan unik yang kamu miliki, atau apa saja yang ingin kamu capai selama masa kuliah. Gunakan kreativitasmu dalam membuat video ini! Selain menjadi ruang ekspresi, tugas ini juga melatih kemampuan komunikasi dan kepercayaan dirimu. Video ini bisa menjadi langkah awal untuk memperkenalkan dirimu kepada teman dan dosen.&quot;
        },
        {
            &quot;ID_Tugas&quot;: 3,
            &quot;Judul&quot;: &quot;Tugas 3: Hello World!&quot;,
            &quot;Deskripsi&quot;: &quot;Selamat datang di dunia pemrograman! Tugas ini mengajakmu untuk membuat kode sederhana &ldquo;Hello, World!&rdquo; menggunakan bahasa Java. Kamu akan belajar bagaimana menulis dan menjalankan program pertamamu, serta memahami dasar-dasar cara kerja kode pemrograman. Tugas ini cocok untuk kamu yang baru pertama kali belajar coding. Jangan lupa untuk mengunggah tangkapan layar hasil kode dan menjelaskan secara singkat apa yang terjadi ketika program dijalankan. Mulailah langkah kecilmu di dunia teknologi dengan semangat!&quot;
        },
        {
            &quot;ID_Tugas&quot;: 4,
            &quot;Judul&quot;: &quot;Tugas 4: Business Brainstorming&quot;,
            &quot;Deskripsi&quot;: &quot;Punya ide bisnis teknologi yang bisa jadi solusi masa depan? Di tugas ini, kamu akan membuat proposal IT Business Plan sederhana. Jelaskan ide bisnismu, masalah yang ingin diselesaikan, solusi berbasis teknologi, serta gambaran target pasar dan model bisnisnya. Tugas ini membantu kamu berpikir kreatif dan inovatif sambil mengenal lebih dalam tentang peluang bisnis di dunia IT. Jangan takut untuk berimajinasi dan menggali ide-ide baru yang bisa memberikan dampak positif!&quot;
        },
        {
            &quot;ID_Tugas&quot;: 5,
            &quot;Judul&quot;: &quot;Tugas 5: Discovering Tech Career&quot;,
            &quot;Deskripsi&quot;: &quot;Temukan berbagai peluang karier menarik di dunia teknologi! Dalam tugas ini, kamu diminta membuat daftar lima karier IT, seperti software engineer atau data analyst. Jelaskan peran dari setiap karier, keterampilan yang dibutuhkan, serta jalur pendidikan atau sertifikasi yang relevan. Tugas ini membantumu memahami dunia karier IT sekaligus merencanakan langkah-langkah strategis selama perkuliahan. Dengan mengenali karier yang sesuai dengan minatmu, kamu bisa mempersiapkan diri untuk masa depan yang cemerlang!&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-mahasiswa-listtugas" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-mahasiswa-listtugas"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mahasiswa-listtugas"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-mahasiswa-listtugas" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mahasiswa-listtugas">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-mahasiswa-listtugas" data-method="GET"
      data-path="api/mahasiswa/listtugas"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-mahasiswa-listtugas', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-mahasiswa-listtugas"
                    onclick="tryItOut('GETapi-mahasiswa-listtugas');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-mahasiswa-listtugas"
                    onclick="cancelTryOut('GETapi-mahasiswa-listtugas');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-mahasiswa-listtugas"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/mahasiswa/listtugas</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-mahasiswa-listtugas"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-mahasiswa-listtugas"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-kegiatan">GET api/kegiatan</h2>

<p>
</p>



<span id="example-requests-GETapi-kegiatan">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://pkkmbadmin.vercel.app/api/kegiatan" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://pkkmbadmin.vercel.app/api/kegiatan"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-kegiatan">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;Nama&quot;: &quot;FUSION&quot;,
            &quot;Tahun&quot;: &quot;2024&quot;
        },
        {
            &quot;Nama&quot;: &quot;STARTUP ACADEMY&quot;,
            &quot;Tahun&quot;: &quot;2024&quot;
        },
        {
            &quot;Nama&quot;: &quot;SOCIAL CAMPAIGN&quot;,
            &quot;Tahun&quot;: &quot;2024&quot;
        },
        {
            &quot;Nama&quot;: &quot;OPEN HOUSE&quot;,
            &quot;Tahun&quot;: &quot;2024&quot;
        },
        {
            &quot;Nama&quot;: &quot;PKKMB&quot;,
            &quot;Tahun&quot;: &quot;2024&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-kegiatan" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-kegiatan"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-kegiatan"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-kegiatan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-kegiatan">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-kegiatan" data-method="GET"
      data-path="api/kegiatan"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-kegiatan', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-kegiatan"
                    onclick="tryItOut('GETapi-kegiatan');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-kegiatan"
                    onclick="cancelTryOut('GETapi-kegiatan');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-kegiatan"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/kegiatan</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-kegiatan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-kegiatan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-mahasiswa--nim-">GET api/mahasiswa/{nim}</h2>

<p>
</p>



<span id="example-requests-GETapi-mahasiswa--nim-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://pkkmbadmin.vercel.app/api/mahasiswa/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://pkkmbadmin.vercel.app/api/mahasiswa/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-mahasiswa--nim-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Mahasiswa not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-mahasiswa--nim-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-mahasiswa--nim-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mahasiswa--nim-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-mahasiswa--nim-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mahasiswa--nim-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-mahasiswa--nim-" data-method="GET"
      data-path="api/mahasiswa/{nim}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-mahasiswa--nim-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-mahasiswa--nim-"
                    onclick="tryItOut('GETapi-mahasiswa--nim-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-mahasiswa--nim-"
                    onclick="cancelTryOut('GETapi-mahasiswa--nim-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-mahasiswa--nim-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/mahasiswa/{nim}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-mahasiswa--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-mahasiswa--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="GETapi-mahasiswa--nim-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-tugas-status--nim---id_tugas-">GET api/tugas/status/{nim}/{id_tugas}</h2>

<p>
</p>



<span id="example-requests-GETapi-tugas-status--nim---id_tugas-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://pkkmbadmin.vercel.app/api/tugas/status/architecto/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://pkkmbadmin.vercel.app/api/tugas/status/architecto/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-tugas-status--nim---id_tugas-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Tugas not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-tugas-status--nim---id_tugas-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-tugas-status--nim---id_tugas-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-tugas-status--nim---id_tugas-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-tugas-status--nim---id_tugas-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-tugas-status--nim---id_tugas-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-tugas-status--nim---id_tugas-" data-method="GET"
      data-path="api/tugas/status/{nim}/{id_tugas}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-tugas-status--nim---id_tugas-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-tugas-status--nim---id_tugas-"
                    onclick="tryItOut('GETapi-tugas-status--nim---id_tugas-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-tugas-status--nim---id_tugas-"
                    onclick="cancelTryOut('GETapi-tugas-status--nim---id_tugas-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-tugas-status--nim---id_tugas-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/tugas/status/{nim}/{id_tugas}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-tugas-status--nim---id_tugas-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-tugas-status--nim---id_tugas-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="GETapi-tugas-status--nim---id_tugas-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_tugas</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_tugas"                data-endpoint="GETapi-tugas-status--nim---id_tugas-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-tugas-submit--nim---taskId---submissionLink-">POST api/tugas/submit/{nim}/{taskId}/{submissionLink}</h2>

<p>
</p>



<span id="example-requests-POSTapi-tugas-submit--nim---taskId---submissionLink-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://pkkmbadmin.vercel.app/api/tugas/submit/architecto/architecto/|{+-0p" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://pkkmbadmin.vercel.app/api/tugas/submit/architecto/architecto/|{+-0p"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-tugas-submit--nim---taskId---submissionLink-">
</span>
<span id="execution-results-POSTapi-tugas-submit--nim---taskId---submissionLink-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-tugas-submit--nim---taskId---submissionLink-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-tugas-submit--nim---taskId---submissionLink-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-tugas-submit--nim---taskId---submissionLink-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-tugas-submit--nim---taskId---submissionLink-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-tugas-submit--nim---taskId---submissionLink-" data-method="POST"
      data-path="api/tugas/submit/{nim}/{taskId}/{submissionLink}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-tugas-submit--nim---taskId---submissionLink-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-tugas-submit--nim---taskId---submissionLink-"
                    onclick="tryItOut('POSTapi-tugas-submit--nim---taskId---submissionLink-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-tugas-submit--nim---taskId---submissionLink-"
                    onclick="cancelTryOut('POSTapi-tugas-submit--nim---taskId---submissionLink-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-tugas-submit--nim---taskId---submissionLink-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/tugas/submit/{nim}/{taskId}/{submissionLink}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-tugas-submit--nim---taskId---submissionLink-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-tugas-submit--nim---taskId---submissionLink-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="POSTapi-tugas-submit--nim---taskId---submissionLink-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>taskId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="taskId"                data-endpoint="POSTapi-tugas-submit--nim---taskId---submissionLink-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>submissionLink</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="submissionLink"                data-endpoint="POSTapi-tugas-submit--nim---taskId---submissionLink-"
               value="|{+-0p"
               data-component="url">
    <br>
<p>Example: <code>|{+-0p</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-presensi-submit--nim---kode_presensi-">POST api/presensi/submit/{nim}/{kode_presensi}</h2>

<p>
</p>



<span id="example-requests-POSTapi-presensi-submit--nim---kode_presensi-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://pkkmbadmin.vercel.app/api/presensi/submit/architecto/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://pkkmbadmin.vercel.app/api/presensi/submit/architecto/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-presensi-submit--nim---kode_presensi-">
</span>
<span id="execution-results-POSTapi-presensi-submit--nim---kode_presensi-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-presensi-submit--nim---kode_presensi-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-presensi-submit--nim---kode_presensi-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-presensi-submit--nim---kode_presensi-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-presensi-submit--nim---kode_presensi-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-presensi-submit--nim---kode_presensi-" data-method="POST"
      data-path="api/presensi/submit/{nim}/{kode_presensi}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-presensi-submit--nim---kode_presensi-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-presensi-submit--nim---kode_presensi-"
                    onclick="tryItOut('POSTapi-presensi-submit--nim---kode_presensi-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-presensi-submit--nim---kode_presensi-"
                    onclick="cancelTryOut('POSTapi-presensi-submit--nim---kode_presensi-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-presensi-submit--nim---kode_presensi-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/presensi/submit/{nim}/{kode_presensi}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-presensi-submit--nim---kode_presensi-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-presensi-submit--nim---kode_presensi-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="POSTapi-presensi-submit--nim---kode_presensi-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>kode_presensi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="kode_presensi"                data-endpoint="POSTapi-presensi-submit--nim---kode_presensi-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-tugas-update--nim---id_tugas-">PUT api/tugas/update/{nim}/{id_tugas}</h2>

<p>
</p>



<span id="example-requests-PUTapi-tugas-update--nim---id_tugas-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://pkkmbadmin.vercel.app/api/tugas/update/architecto/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://pkkmbadmin.vercel.app/api/tugas/update/architecto/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-tugas-update--nim---id_tugas-">
</span>
<span id="execution-results-PUTapi-tugas-update--nim---id_tugas-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-tugas-update--nim---id_tugas-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-tugas-update--nim---id_tugas-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-tugas-update--nim---id_tugas-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-tugas-update--nim---id_tugas-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-tugas-update--nim---id_tugas-" data-method="PUT"
      data-path="api/tugas/update/{nim}/{id_tugas}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-tugas-update--nim---id_tugas-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-tugas-update--nim---id_tugas-"
                    onclick="tryItOut('PUTapi-tugas-update--nim---id_tugas-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-tugas-update--nim---id_tugas-"
                    onclick="cancelTryOut('PUTapi-tugas-update--nim---id_tugas-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-tugas-update--nim---id_tugas-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/tugas/update/{nim}/{id_tugas}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-tugas-update--nim---id_tugas-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-tugas-update--nim---id_tugas-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="PUTapi-tugas-update--nim---id_tugas-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_tugas</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_tugas"                data-endpoint="PUTapi-tugas-update--nim---id_tugas-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-users">GET api/users</h2>

<p>
</p>



<span id="example-requests-GETapi-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://pkkmbadmin.vercel.app/api/users" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://pkkmbadmin.vercel.app/api/users"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-users">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;nim&quot;: &quot;22515010111006&quot;,
            &quot;name&quot;: &quot;Budi Santoso&quot;,
            &quot;prodi&quot;: &quot;Teknik Informatika&quot;,
            &quot;role&quot;: &quot;PIT&quot;
        },
        {
            &quot;nim&quot;: &quot;22515010111007&quot;,
            &quot;name&quot;: &quot;Indah Permata&quot;,
            &quot;prodi&quot;: &quot;Sistem Informasi&quot;,
            &quot;role&quot;: &quot;PIT&quot;
        },
        {
            &quot;nim&quot;: &quot;22515010111008&quot;,
            &quot;name&quot;: &quot;Andi Saputra&quot;,
            &quot;prodi&quot;: &quot;Teknik Komputer&quot;,
            &quot;role&quot;: &quot;PIT&quot;
        },
        {
            &quot;nim&quot;: &quot;22515010111009&quot;,
            &quot;name&quot;: &quot;Lestari Wijaya&quot;,
            &quot;prodi&quot;: &quot;Teknologi Informasi&quot;,
            &quot;role&quot;: &quot;PIT&quot;
        },
        {
            &quot;nim&quot;: &quot;22515010111010&quot;,
            &quot;name&quot;: &quot;Mira Asmara&quot;,
            &quot;prodi&quot;: &quot;Pendidikan Teknologi Informasi&quot;,
            &quot;role&quot;: &quot;PIT&quot;
        },
        {
            &quot;nim&quot;: &quot;22515010111001&quot;,
            &quot;name&quot;: &quot;Ahmad Fauzi&quot;,
            &quot;prodi&quot;: &quot;Teknik Informatika&quot;,
            &quot;role&quot;: &quot;QC&quot;
        },
        {
            &quot;nim&quot;: &quot;22515010111002&quot;,
            &quot;name&quot;: &quot;Siti Nurhaliza&quot;,
            &quot;prodi&quot;: &quot;Sistem Informasi&quot;,
            &quot;role&quot;: &quot;QC&quot;
        },
        {
            &quot;nim&quot;: &quot;22515010111003&quot;,
            &quot;name&quot;: &quot;Rizky Hidayat&quot;,
            &quot;prodi&quot;: &quot;Teknik Komputer&quot;,
            &quot;role&quot;: &quot;QC&quot;
        },
        {
            &quot;nim&quot;: &quot;22515010111004&quot;,
            &quot;name&quot;: &quot;Dewi Kartika&quot;,
            &quot;prodi&quot;: &quot;Teknologi Informasi&quot;,
            &quot;role&quot;: &quot;QC&quot;
        },
        {
            &quot;nim&quot;: &quot;22515010111005&quot;,
            &quot;name&quot;: &quot;Firman Saputra&quot;,
            &quot;prodi&quot;: &quot;Pendidikan Teknologi Informasi&quot;,
            &quot;role&quot;: &quot;QC&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-users" data-method="GET"
      data-path="api/users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users"
                    onclick="tryItOut('GETapi-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users"
                    onclick="cancelTryOut('GETapi-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-mahasiswa-rekap-kehadiran--nim-">GET api/mahasiswa/rekap-kehadiran/{nim}</h2>

<p>
</p>



<span id="example-requests-GETapi-mahasiswa-rekap-kehadiran--nim-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://pkkmbadmin.vercel.app/api/mahasiswa/rekap-kehadiran/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://pkkmbadmin.vercel.app/api/mahasiswa/rekap-kehadiran/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-mahasiswa-rekap-kehadiran--nim-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Mahasiswa tidak ditemukan.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-mahasiswa-rekap-kehadiran--nim-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-mahasiswa-rekap-kehadiran--nim-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mahasiswa-rekap-kehadiran--nim-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-mahasiswa-rekap-kehadiran--nim-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mahasiswa-rekap-kehadiran--nim-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-mahasiswa-rekap-kehadiran--nim-" data-method="GET"
      data-path="api/mahasiswa/rekap-kehadiran/{nim}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-mahasiswa-rekap-kehadiran--nim-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-mahasiswa-rekap-kehadiran--nim-"
                    onclick="tryItOut('GETapi-mahasiswa-rekap-kehadiran--nim-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-mahasiswa-rekap-kehadiran--nim-"
                    onclick="cancelTryOut('GETapi-mahasiswa-rekap-kehadiran--nim-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-mahasiswa-rekap-kehadiran--nim-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/mahasiswa/rekap-kehadiran/{nim}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-mahasiswa-rekap-kehadiran--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-mahasiswa-rekap-kehadiran--nim-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>nim</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nim"                data-endpoint="GETapi-mahasiswa-rekap-kehadiran--nim-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
