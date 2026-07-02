---
modified: 2026-07-02T14:10:00.000Z
title: Bibliometrics
---

# Bibliometrics

This folder contains the bibliometric page of the website.

The page is intentionally simple: the bibliometric values are checked by hand, stored in editable data files, and rendered by `index.php`.

## Files

- `index.php`
  - renders the bibliometrics page;
  - defines the paths to the JSON data files;
  - includes `helper.php`;
  - displays the external bibliometric indicators and the local citation record.

- `helper.php`
  - loads and validates the JSON data files;
  - prepares the citation array used by the page;
  - prepares the bibliometric indicator array used by the page;
  - computes the self-assessed article count, citation count, and h-index;
  - prepares update timestamps for the rendered page.

- `bibliometrics.css`
  - contains the CSS rules specific to this page;
  - keeps the citation list and the bibliometric table styling outside `index.php`.

- `citation-data.json`
  - contains the local self-assessed citation database;
  - is used by `helper.php` to compute the self-assessed indicators.

- `bibliometric-data.json`
  - contains the manually checked external bibliometric indicators.

## TODO

- [x] Explain how the independent self-assessment is computed.
- [x] Explain the known discrepancies among databases.
- [x] Add a note that only Scopus and WoS are relevant for the Italian ASN habilitation process.
- [x] Add a link or reference to the email exchange with Scopus, where they confirmed that they do not correct this kind of counting anymore.
- [x] Explain why the external data are not automatically web-scraped.
- [x] Keep support for ResearchGate, zbMATH, and MathSciNet.
- [x] Move reusable PHP helpers to a dedicated `helper.php` file.
- [x] Move page-specific CSS to a dedicated `bibliometrics.css` file.
- [ ] Add support for automatic web scraping or API-based retrieval of bibliometric data, where possible.

## Self-assessment of bibliometric indicators

The page includes a local self-assessment of my bibliometric indicators.

The aim is to mimic a conservative counting convention, close in spirit to the restrictive behaviour of databases such as Scopus and Web of Science.

Current convention:

- a publication is counted only if it has a valid publisher DOI;
- citations are counted only for countable publications;
- arXiv DOIs are excluded;
- ResearchGate DOIs are excluded;
- the h-index is computed from the resulting local citation counts.

The working assumption is that DOI-bearing articles, after these exclusions, have passed peer review.

The local citation database is manually curated. It is obtained by comparing the information available from the external sources listed in the indicators table and by recording the citations that appear to satisfy the convention above.

## Known discrepancies among databases

- Scopus and WoS do not seem to count citations to an arXiv preprint once the corresponding final paper has appeared, even when the arXiv page correctly points to the final published version.
- Google Scholar also tracks theses, reports, presentations, posters, and other documents found on the web. For this reason, its numbers are usually more generous.
- ResearchGate similarly tracks material uploaded to the platform or scraped by its systems.
- For the Italian National Scientific Habilitation, the relevant databases are Scopus and Web of Science. The other sources are displayed only for context.

## Technical implementation

### Data files in JSON format

The data files are currently written in JSON:

```text
bibliometrics/
  citation-data.json
  bibliometric-data.json
```

JSON is used because PHP can read it natively through `json_decode()`.

This has a few practical advantages:

- the data files are not executable PHP code;
- no external parser is needed;
- the page remains portable on shared web hosting;
- syntax errors can be reported through `json_last_error_msg()`.

### PHP logic in `helper.php`

Most reusable PHP logic has been moved out of `index.php` and into `helper.php`.

The helper handles:

- loading `citation-data.json`;
- loading `bibliometric-data.json`;
- validating the expected array structures;
- preparing the array of external bibliometric indicators;
- preparing the array of self-recorded citations;
- counting self-assessed articles;
- counting self-assessed citations;
- computing the self-assessed h-index;
- sorting the visible citation record;
- preparing the update timestamps used by the page.

The initial PHP block in `index.php` is intentionally short. It only sets the data-file paths, includes `helper.php`, calls `prepare_bibliometrics_page_data()`, and assigns the variables used by the HTML template.

### Page-specific style in `bibliometrics.css`

The CSS rules specific to this page have been moved to `bibliometrics.css`.

This keeps `index.php` focused on structure and rendering, while the dedicated stylesheet handles:

- the citation list layout;
- the nested list of citing papers;
- the bibliometric indicators table;
- the mobile horizontal scrolling behaviour for the table.

The page still inherits the general website layout from:

```text
../src/style.css
../src/darkmode.css
```

### From YAML to JSON

The current JSON format is the result of a few intermediate attempts.

At first, I tried to store the data in YAML files. YAML is readable and convenient to edit by hand, but I was not able to install or enable the corresponding PHP library on my web hosting service.

I then converted the data back to XML. This avoided the YAML dependency problem, but the resulting files were not very readable and were inconvenient to modify manually.

After that, I tried to store the data in PHP files returning arrays. This was slightly more readable than XML and easy to load from `index.php`, but it had the drawback that the data files were still executable PHP code.

For this reason, I finally moved the data to JSON. JSON is stricter and less pleasant to edit than YAML, but it is supported natively by PHP, does not require external libraries, and keeps the data separated from executable code.

## JSON editing notes

JSON is stricter than YAML, so the data files should respect these rules:

- strings must use double quotes;
- keys must use double quotes;
- booleans are written as `true` or `false`;
- missing values are written as `null`;
- trailing commas are not allowed.

Example:

```json
{
  "articles": [
    {
      "title": "Example article",
      "authors": "A. Author",
      "doi": "10.0000/example",
      "citations": []
    }
  ]
}
```

## Known limitations

- The external indicators are still manually curated.
- The page does not automatically query Scopus, WoS, Google Scholar, ResearchGate, zbMATH, or MathSciNet.
- JSON is less pleasant to edit by hand than YAML because it does not allow comments and requires strict punctuation.
- Syntax errors in JSON are reported by `json_last_error_msg()` inside `helper.php`.

## Layout note

- [x] Layout harmonized with the rest of the website: sections use the same `sec`, `sec-title`, `big-title shaded`, `list`, `content`, `content-container`, and footer structure visible in the research page example.
