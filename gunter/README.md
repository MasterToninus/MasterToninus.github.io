# Gunter

Sottosezione non accademica del sito `antoniomiti.it`.

## Stato del refactor

- Layout PHP uniformato tramite `src/gunter.php`.
- Stili locali accentrati in `src/gunter.css`.
- Navbar condivisa fra le pagine PHP principali.
- Navbar aggiornata per funzionare correttamente anche su mobile tramite il collapse Bootstrap.
- Dati hardware riconvertiti da YAML a JSON: `hardware/pc_data.json`.
- Lettura dati hardware aggiornata a `json_decode`, senza librerie esterne.
- Parser Markdown mantenuto in `src/Parsedown.php`.

## File principali

- `index.php`: pagina indice della sottosezione.
- `facciata.php`: rendering Markdown di `vetrine.md` e `todo-facciata.md`.
- `hardware/index.php`: rendering dei dati hardware da JSON.
- `hardware/pc_data.json`: dati hardware.
- `nonno/index.php`: rendering dei capitoli Markdown in `nonno/Capitoli`.
- `meteo/index.php`: dashboard meteo.
- `src/gunter.php`: helper condivisi.
- `src/gunter.css`: stile condiviso locale.
- `src/Parsedown.php`: parser Markdown.

## TODO

- [ ] Libro nonno navigabile.
- [ ] Archivio albero genealogico.
  - Si possono esportare i file GEDCOM da MyHeritage: [link](https://www.myheritage.it/help-center?a=Come-posso-scaricare-(esportare)-un-file-GEDCOM-del-mio-albero-genealogico-dal-mio-sito-di-famiglia---id--bPSFTnHBQNauRgs6JzqGiA&srsltid=AfmBOoqm3TVy_HMFztVtv_2s435XKzAOl1Z0pxmsGXiMAVnHqMdVXkpL).
- [ ] Pagina hardware relativa anche agli smartphone e ai portatili.
