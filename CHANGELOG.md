# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [0.0.3] - 25 November 2026
### Fixed
- Images in Amasty Shopby AJAX output were converted even when NextGenImages was disabled
- Non-string or empty Amasty Shopby AJAX output no longer causes a type error
- Declared missing dependencies on Yireo_NextGenImages and Magento_Store

### Changed
- Composer constraints are now bounded: PHP 8.1+, magento/framework ^103.0, amasty/shopby ^2.13 || ^3.0 || ^4.0
