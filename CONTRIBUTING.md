# Contributing to MicroSymfony

This contribution guide was taken and adapted from [API-Platform](https://github.com/api-platform/api-platform/blob/main/.github/CONTRIBUTING.md?plain=1).

First, thank you for contributing, you're awesome!

To have your code integrated in the MicroSymfony project, there are some rules to
follow, but don't panic, it's easy!


## Reporting Bugs

If you happen to find a bug, we kindly request you to report it. However, before submitting it, please:

* Check the [project documentation available online](README.md)

Then, if it appears that it's a real bug, you may report it using Github by following these 3 points:

* Check if the bug is not [already reported](https://github.com/strangebuzz/MicroSymfony/issues?q=is%3Aopen+is%3Aissue+label%3Abug)!
* A clear title to resume the issue
* A description of the workflow needed to reproduce the bug,

> _NOTE:_ Don’t hesitate to give as much information as you can (OS, PHP version extensions...)


## Pull Requests

### Writing a Pull Request

You should base your changes on the `main` branch.

### Matching Coding Standards

The API Platform project follows [Symfony coding standards](https://symfony.com/doc/current/contributing/code/standards.html).
But don't worry, you can fix CS issues automatically using the [PHP CS Fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer) tool:

```bash
make fix-php
```

or 

```bash
castor fix-php
```

And then, add fixed file to your commit before push.
Be sure to add only **your modified files**. 
If another files are fixed by cs tools, just revert it before commit.

### Sending a Pull Request

When you send a PR, just make sure that:

* You add valid test cases (your code may already be covered by the [automated smoke tests](https://github.com/strangebuzz/MicroSymfony/blob/main/tests/Functional/Controller/StaticRoutesSmokeTest.php)).
* Tests are green.
* Your PR must include some documentation
* You make the PR on the same branch you based your changes on. If you see commits
  that you did not make in your PR, you're doing it wrong.
* Also don't forget to add a comment when you update a PR with a ping to [the maintainers](https://github.com/orgs/strangebuzz/people),
  so he/she will get a notification.
* Don't add `@author` doc blocks to the added code

Fill in the header from the pull request template and confirm to create your pull
request.

If there are more than one commit in your PR, they will be automatically be squashed
when the PR is accepted and merge.


# License and Copyright Attribution

When you open a Pull Request to the MicroSymfony project, you agree to license your
code under the [MIT license](LICENSE) and to transfer the copyright on the submitted
code to [Strangebuzz](https://github.com/strangebuzz).

Be sure to you have the right to do that (if you are a professional, ask your company)!

If you include code from another project, please mention it in the Pull Request
description and credit the original author.