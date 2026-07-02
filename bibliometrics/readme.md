---
modified: 2026-07-02T09:05:00.000Z
title: Bibliometrics
---

# Bibliometrics

## TODO - content

- [ ] Explain how the independent self-assessment is computed.
  - It is meant to mimic the conservative counting style of Scopus.
  - A publication or citation is counted only when it has an associated DOI.
  - arXiv DOIs and ResearchGate DOIs are discarded.
  - The working assumption is that DOI-bearing articles, after these exclusions, have passed peer review.

- [ ] Explain the known discrepancies among databases.
  - Scopus and WoS do not seem to count citations to a preprint once the corresponding final paper has appeared, even when the arXiv page correctly points to the final published version.
  - Google Scholar also tracks theses, reports, presentations, posters, and other documents found on the web; for this reason its numbers are usually more generous.
  - ResearchGate similarly tracks material uploaded to the platform or scraped by its systems.
  - zbMATH and MathSciNet need a more careful explanation after I understand better how their counting works.

- [ ] Add a note that only Scopus and WoS are relevant for the Italian ASN habilitation process.

- [ ] Add a link or reference to the email exchange with Scopus, where they confirmed that they do not correct this kind of counting anymore.
  - Possible contextual comment: this policy may indirectly discourage the use of arXiv preprints, but this should be phrased carefully.

- [ ] Explain why the external data are not automatically web-scraped.
  - Some databases do not expose a convenient public API.
  - Some databases have anti-bot systems or access restrictions.
  - For transparency, the external values are therefore manually checked and manually inserted.

## TODO - technical

- [x] Move manually entered external bibliometric data to a separate configuration file.
  - Current file: `bibliometric-data.php`.
  - The file uses a PHP array instead of XML because it is more readable and easier to edit by hand at this stage.
  - Please remember that this setup is maintained by a beginner, so simplicity is preferred over technical elegance.

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

## Notes

The page currently separates two kinds of data:

- self-assessed bibliometric data, computed from the local citation database;
- external bibliometric data, manually inserted in `bibliometric-data.php`.
