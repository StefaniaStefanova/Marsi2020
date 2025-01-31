using RestSharp;
using NUnit.Framework;
using System.Threading.Tasks;

namespace ApiTests
{
    public class RestSharpTest
    {
        private RestClient _client;
        private RestRequest _request;

        [SetUp]
        public void Setup()
        {
            // Инициализация на RestClient с базовия URL на публичен API
            _client = new RestClient("https://jsonplaceholder.typicode.com");
        }

        [Test]
        public async Task Test_GetPosts()
        {
            // Заявка GET към публичен API за получаване на постове
            _request = new RestRequest("/posts", Method.Get);

            // Изпълняваме заявката
            RestResponse response = await _client.ExecuteAsync(_request);

            // Проверка дали отговорът е успешен (статус код 200)
            Assert.That(response.StatusCode, Is.EqualTo(System.Net.HttpStatusCode.OK), "Failed to get posts.");

            // Проверка дали съдържа някакви постове (например проверка за дължината на отговора)
            Assert.That(response.Content.Length, Is.GreaterThan(0), "No posts returned.");
        }
    }
}
