---
modified: 2026-07-02T10:05:00.000Z
title: Bibliometrics
---

# Bibliometrics

## TODO - content

- [x] Explain how the independent self-assessment is computed.
  - It is meant to mimic the conservative counting style of Scopus.
  - A publication or citation is counted only when it has an associated DOI.
  - arXiv DOIs and ResearchGate DOIs are discarded.
  - The working assumption is that DOI-bearing articles, after these exclusions, have passed peer review.

- [x] Explain the known discrepancies among databases.
  - Scopus and WoS do not seem to count citations to a preprint once the corresponding final paper has appeared, even when the arXiv page correctly points to the final published version.
  - Google Scholar also tracks theses, reports, presentations, posters, and other documents found on the web; for this reason its numbers are usually more generous.
  - ResearchGate similarly tracks material uploaded to the platform or scraped by its systems.
  - zbMATH and MathSciNet need a more careful explanation after I understand better how their counting works.

- [x] Add a note that only Scopus and WoS are relevant for the Italian ASN habilitation process.

- [x] Add a link or reference to the email exchange with Scopus, where they confirmed that they do not correct this kind of counting anymore.
  - Possible contextual comment: this policy may indirectly discourage the use of arXiv preprints, but this should be phrased carefully.

- [x] Explain why the external data are not automatically web-scraped.
  - Some databases do not expose a convenient public API.
  - Some databases have anti-bot systems or access restrictions.
  - For transparency, the external values are therefore manually checked and manually inserted.

## TODO - technical

- [x] Move manually entered external bibliometric data to a separate configuration file.
  - Current file: `bibliometric-data.php`.
  - The file contains only the external bibliometric indicators.
  - The file uses a PHP array instead of XML because it is more readable and easier to edit by hand at this stage.
  - Please remember that this setup is maintained by a beginner, so simplicity is preferred over technical elegance.

- [x] Move the self-assessed citation database from `citations.xml` to a PHP configuration file.
  - Current file: `citation-data.php`.
  - Current status: `index.php` no longer reads `citations.xml`.
  - The citation records are separated from the external bibliometric indicators.

- [x] Keep local citation data and external bibliometric data in two separate PHP files.
  - Local citation database: `citation-data.php`.
  - External bibliometric indicators: `bibliometric-data.php`.
  - `index.php` loads both files and computes the self-assessed indicators from `citation-data.php`.

- [x] Add configurable support for ResearchGate, zbMATH, and MathSciNet.
  - Current status: profile URLs are configured.
  - Missing numerical values are displayed as `n/a`.

- [ ] Add support for automatic web scraping or API-based retrieval of bibliometric data, where possible.
  - [ ] Scopus
  - [ ] Google Scholar
  - [ ] WoS
  - [ ] ResearchGate
  - [ ] zbMATH
  - [ ] MathSciNet

- [ ] Add a visible timestamp for the external bibliometric data.
  - The timestamp should make clear when the manually entered values were last checked.
  - This is important because the data are not continuously updated.

- [ ] Consider moving page-specific CSS to a separate stylesheet.

- [ ] Consider moving the remaining page-specific PHP logic to a dedicated helper file.
  - Current remaining logic: computing the self-assessed article count, citation count, h-index, and ordered citation list from the PHP data array.

## Notes

The page currently separates the two kinds of data into two PHP files:

- `citation-data.php` contains the self-assessed citation data and is used by `index.php` to compute the local article count, citation count, h-index, and ordered citation list;
- `bibliometric-data.php` contains the manually inserted external bibliometric indicators.

The old `citations.xml` file is no longer needed by `index.php`.
