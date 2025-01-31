# Marsi2020.com - Website Testing Documentation

## Introduction
This repository contains the test documentation and examples of different tests performed for the website **Marsi2020.com**. The website has been developed and thoroughly tested to ensure that all major features work correctly and the user experience is seamless across multiple devices and browsers.

## Author
This website was created and tested by **Stefania Stefanova**. Below, you'll find details on the testing process, the tools used, and the results of the tests conducted.

## Testing Overview

The following types of testing were performed on the Marsi2020.com website:

- **Functional Testing**: Ensures that the main functionality of the website (forms, navigation, search, etc.) works as expected.
- **UI/UX Testing**: Verifies the user interface and overall user experience.
- **Performance Testing**: Measures the loading speed and responsiveness of the website.
- **Compatibility Testing**: Ensures that the website is compatible across different browsers and devices.

## Test Strategy

- **Manual Testing**: Functional, UI, and exploratory tests were executed manually.
- **Automated Testing**: Selenium WebDriver was used for UI automation tests, and RESTSharp was used for testing APIs.
- **Performance Testing**: JMeter was used for load testing to simulate multiple users accessing the website simultaneously.

## Tools Used

- **Selenium WebDriver**: For automating browser interactions and UI testing.
- **RESTSharp**: For testing REST APIs and their responses.
- **JMeter**: For performance and load testing.

## Test Plan Summary

1. **Functional Tests**:
   - Homepage navigation and UI elements.
   - Verification of links (internal and external).
   - Contact form submission and validation.
   - Search functionality.

2. **UI/UX Tests**:
   - Ensuring the website is responsive across devices.
   - Verifying proper layout and appearance on mobile devices and desktops.

3. **Performance Tests**:
   - Testing the website under load (using JMeter).
   - Ensuring that the page loads within an acceptable time limit.

4. **Browser Compatibility**:
   - Tests conducted across **Chrome**, **Firefox**, **Opera**, and **Safari** to ensure consistent behavior.

## Test Cases Examples

### 1. Test Case: Homepage Navigation
- **Test**: Open the homepage and verify that all links work correctly.
- **Expected Result**: All internal and external links must lead to the correct pages.
- **Priority**: High

### 2. Test Case: Contact Form Submission
- **Test**: Submit the contact form with valid and invalid data.
- **Expected Result**: The form must show appropriate success or error messages.
- **Priority**: High

### 3. Test Case: Page Load Speed
- **Test**: Measure the homepage load time.
- **Expected Result**: The homepage must load within 3 seconds.
- **Priority**: Medium

## Known Issues

During testing, the following issues were identified:

1. **Homepage load time**: The homepage takes about 10 seconds to load, which needs optimization.
2. **Incorrect link to Services Page**: The link for the services page on the homepage leads to a 404 error.
3. **Footer Links Not Working**: None of the footer links open the correct pages.
4. **Contact Form accepts invalid email**: The contact form accepts emails with only symbols and no valid domain.

## Future Testing

### Out of Scope for Current Phase:
The following types of testing will be performed in future stages of testing:
- **Backend Database Testing**: Validation of database data and query checks.
- **API Testing**: Automated tests using tools like Postman and RESTSharp for API endpoints.
- **Security and Penetration Testing**: Security vulnerability testing, including SQL injection and XSS attacks.

## Conclusion

The Marsi2020.com website has been successfully tested for functionality, user interface, and performance. The website is compatible with various devices and browsers. The issues identified will be addressed in the following development and testing phases.

For more details or to contribute to testing, please refer to the `test` folder in this repository.
