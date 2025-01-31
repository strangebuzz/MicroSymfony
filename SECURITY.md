# Security Policy

We take the security of our project seriously. If you discover a security vulnerability, we encourage you to report it responsibly to ensure the issue is addressed quickly and effectively.


## Reporting a Vulnerability

If you find a security vulnerability in this project, please follow the steps below:

1. **Do not disclose the vulnerability publicly.** Contact us privately via email to give us the opportunity to resolve the issue before it is made public.

2. Send an email to [j84x6cfso@mozmail.com](mailto:j84x6cfso@mozmail.com) with:
    - A detailed description of the vulnerability
    - Steps to reproduce the vulnerability, if possible
    - Any additional relevant information (logs, screenshots, etc.)

3. We aim to acknowledge your report within 48 hours and will keep you informed of the progress on the fix.


## Fixing Policy

We aim to resolve security issues in a timely and transparent manner:

- **Fix timeline:** Once a vulnerability is identified, we will strive to issue a fix within 7 to 14 days.
- **User notifications:** After a fix is released, we will notify users through release notes and/or a public announcement on our [GitHub page](https://github.com/strangebuzz/microsymfony).


## Supported Versions

We only maintain the main branch.

If you are using an unsupported version, we encourage you to upgrade to the latest
version to ensure the security of your project.

To do so you can cherry-pick the patch that was applied to the main branch to fix
the security issue.
All security related patches commits are prefixed by `security:`.

Thank you for helping us keep your open-source project secure!


## Checking Vulnerabilities (GitHub actions)

A GitHub action runs the `composer audit` command.
When the job finds a security vulnerability, it fails with an output like this:

    Run composer audit
    Found 1 security vulnerability advisory affecting 1 package:
    +-------------------+----------------------------------------------------------------------------------+
    | Package           | twig/twig                                                                        |
    | Severity          | medium                                                                           |
    | CVE               | CVE-2025-24374                                                                   |
    | Title             | Twig security issue where escaping was missing when using null coalesce operator |
    | URL               | https://github.com/advisories/GHSA-3xg3-cgvq-2xwr                                |
    | Affected versions | >=3.16.0,<3.19.0                                                                 |
    | Reported at       | 2025-01-29T18:41:43+00:00                                                        |
    +-------------------+----------------------------------------------------------------------------------+
    Error: Process completed with exit code 1

In this case, the `twig/twig` dependency has to be updated to fix the error. 
You have to run:

    composer up twig/twig