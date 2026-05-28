<?php
// Este arquivo gera um screenshot SVG para o painel WP
header('Content-Type: image/svg+xml');
echo '<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="900">
<rect width="1200" height="900" fill="#1B6FAF"/>
<rect x="0" y="0" width="1200" height="76" fill="#ffffff"/>
<text x="40" y="50" font-family="Arial" font-size="22" font-weight="bold" fill="#1B6FAF">Mãos Pequenas · Lar Assistencial</text>
<text x="600" y="420" font-family="Arial" font-size="48" font-weight="bold" fill="#ffffff" text-anchor="middle">Cada criança merece</text>
<text x="600" y="480" font-family="Arial" font-size="48" font-weight="bold" fill="#F5C518" text-anchor="middle">um lar cheio de amor</text>
<text x="600" y="540" font-family="Arial" font-size="20" fill="rgba(255,255,255,0.8)" text-anchor="middle">Lar Mãos Pequenas — Diadema, São Paulo</text>
</svg>';
