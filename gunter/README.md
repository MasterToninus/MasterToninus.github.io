# Gunter

Sottosezione non accademica del sito `antoniomiti.it`.

## Stato del refactor

- Layout PHP uniformato tramite `src/gunter.php`.
- Stili locali accentrati in `src/gunter.css`.
- Navbar condivisa fra tutte le pagine PHP della sottosezione.
- Navbar aggiornata per funzionare correttamente anche su mobile: collapse Bootstrap, dropdown interno e piccolo fallback JavaScript nativo se Bootstrap o jQuery non vengono caricati.
- Dati hardware riconvertiti da YAML a JSON: `hardware/pc_data.json`.
- Aggiunta sottopagina smartphone con dati JSON dedicati: `hardware/smartphone_data.json`.
- Lettura dati hardware aggiornata a `json_decode`, senza librerie esterne.
- Parser Markdown mantenuto in `src/Parsedown.php`.
- Pagine HTML statiche convertite in PHP per usare gli stessi helper comuni.

## File principali

- `index.php`: pagina indice della sottosezione.
- `facciata.php`: rendering Markdown di `vetrine.md` e `todo-facciata.md`.
- `eliminata.php`: archivio delle sezioni eliminate.
- `h4x0rs.php`: pagina template Hacker Bootstrap.
- `gallery/index.php`: galleria manuale e link alla galleria generata.
- `diego/index.php`: workspace Diego.
- `listanozze/index.php` e `listanozze/index_en.php`: lista nozze italiana e inglese.
- `hardware/index.php`: rendering dei dati hardware PC da JSON.
- `hardware/smartphones.php`: rendering dei dati smartphone da JSON.
- `hardware/pc_data.json`: dati hardware PC.
- `hardware/smartphone_data.json`: dati smartphone.
- `nonno/index.php`: rendering dei capitoli Markdown in `nonno/Capitoli`.
- `meteo/index.php`: dashboard meteo.
- `src/gunter.php`: helper condivisi.
- `src/gunter.css`: stile condiviso locale.
- `src/Parsedown.php`: parser Markdown.

## TODO

- [ ] Libro nonno navigabile.
- [ ] Archivio albero genealogico.
  - Si possono esportare i file GEDCOM da MyHeritage: [link](https://www.myheritage.it/help-center?a=Come-posso-scaricare-(esportare)-un-file-GEDCOM-del-mio-albero-genealogico-dal-mio-sito-di-famiglia---id--bPSFTnHBQNauRgs6JzqGiA&srsltid=AfmBOoqm3TVy_HMFztVtv_2s435XKzAOl1Z0pxmsGXiMAVnHqMdVXkpL).
- [x] Pagina hardware relativa agli smartphone.
- [ ] Pagina hardware relativa ai portatili.
