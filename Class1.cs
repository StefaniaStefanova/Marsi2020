using NUnit.Framework;
using RestSharp;
using System.Threading.Tasks;

namespace ApiTests
{
    [TestFixture]
    public class ContactFormTests
    {
        private RestClient _client;
        private RestRequest _request;

        [SetUp]
        public void Setup()
        {
            
            _client = new RestClient("https://marsi2020.com");
        }

       
        [Test]
        public async Task TestContactFormSubmission_Success()
        {
            _request = new RestRequest("/свържете-се-с-нас/#wpcf7-f62-p478-o1", Method.Post); 
            _request.AddParameter("your-name", "Тестово име");
            _request.AddParameter("your-email", "test@example.com");
            _request.AddParameter("your-message", "Тестово съобщение");

           
            RestResponse response = await _client.ExecuteAsync(_request);

            
            Assert.That(response.StatusCode, Is.EqualTo(System.Net.HttpStatusCode.OK), "Contact form submission failed!");

            
            Assert.That(response.Content, Contains.Substring("Thank you for your message"), "Form submission did not return expected message.");
        }

       
        [Test]
        public async Task TestContactFormSubmission_InvalidEmail()
        {
            // Тест с невалиден имейл адрес
            _request = new RestRequest("/свържете-се-с-нас/#wpcf7-f62-p478-o1", Method.Post); // Пътят трябва да е правилен
            _request.AddParameter("your-name", "Тестово име");
            _request.AddParameter("your-email", "invalid-email");
            _request.AddParameter("your-message", "Тестово съобщение");

            // Изпълняваме заявката
            RestResponse response = await _client.ExecuteAsync(_request);

            // Проверка дали сървърът връща съобщение за невалиден имейл
            Assert.That(response.Content, Contains.Substring("One or more fields have an error"), "Invalid email did not trigger error.");
        }

        // Тест с празни полета
        [Test]
        public async Task TestContactFormSubmission_EmptyFields()
        {
            // Тест с празни полета
            _request = new RestRequest("/свържете-се-с-нас/#wpcf7-f62-p478-o1", Method.Post); // Пътят трябва да е правилен
            _request.AddParameter("your-name", "");
            _request.AddParameter("your-email", "");
            _request.AddParameter("your-message", "");

            // Изпълняваме заявката
            RestResponse response = await _client.ExecuteAsync(_request);

            // Проверка дали сървърът връща съобщение за празни полета
            Assert.That(response.Content, Contains.Substring("All fields are required"), "Empty fields did not trigger error.");
        }

        // Проверка дали контактната страница съществува
        [Test]
        public async Task TestContactPageExists()
        {
            // Проверяваме дали контактната страница съществува
            var getRequest = new RestRequest("/свържете-се-с-нас/", Method.Get);  // Проверяваме за валидност на страницата
            RestResponse getResponse = await _client.ExecuteAsync(getRequest);

            // Проверяваме дали получаваме отговор 200 OK
            Assert.That(getResponse.StatusCode, Is.EqualTo(System.Net.HttpStatusCode.OK), "Contact page not found!");
        }
    }
}
