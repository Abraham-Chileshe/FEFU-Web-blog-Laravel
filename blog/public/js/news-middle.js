document.addEventListener('DOMContentLoaded', function () {
    const apiKey = 'fcbf5d6272d34629a4eb05e6ceda09dc'; // Replace with your News API key
    const newsContainer = document.getElementById('news_area');

    // Example: Fetch top headlines
    const apiUrl = `https://newsapi.org/v2/top-headlines?country=us&apiKey=${apiKey}`;

    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            if (data.articles) {
                // Display news articles
                const firstFiveArticles = data.articles.slice(0, 25);


                firstFiveArticles.forEach(article =>  {
                    const articleElement = document.createElement('div');
                    articleElement.innerHTML = `
                    <div class="mt-3 card main-card">
                    <div class="post">
                    <a href="${article.url}" style="text-transform: capitalize"> ${article.source.name}<span class="sr-only">(current)</span>
                            </a>
                        <h6>Today: ${article.publishedAt}</h6>
                        <div class="fakeimg rounded" style="background-image: url('${article.urlToImage}'); background-size:cover; height:200px;"></div>
                        <h5 class="mt-4 mb-2"> ${article.title}</h5>

                        <p> ${article.description}
                        </p>

                        <a href="${article.url}" class="btn float-right read-btn" style="min-width:70px"><i class="mr-1 fa fa-eye"></i> Read More</a>
                            
                        </div>
                    </div>
                </div>`;
                    newsContainer.appendChild(articleElement);
                });
            } else {
                console.error('Error fetching news:', data.message || 'Unknown error');
            }
        })
        .catch(error => {
            console.error('Error fetching news:', error);
        });
});