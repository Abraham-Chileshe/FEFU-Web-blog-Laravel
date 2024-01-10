document.addEventListener('DOMContentLoaded', function () {
const apiKey = 'fcbf5d6272d34629a4eb05e6ceda09dc'; // Replace with your News API key
const newsContainer = document.getElementById('news-container');

// Example: Fetch top headlines
const apiUrl = `https://newsapi.org/v2/top-headlines?country=us&apiKey=${apiKey}`;

fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
        if (data.articles) {
            // Display news articles
            const firstFiveArticles = data.articles.slice(0, 3);


            firstFiveArticles.forEach(article =>  {
                const articleElement = document.createElement('div');
                articleElement.innerHTML = `
                <div class="">
                <div class="card">
                    <div class="card-header" style=""border-radius:0px">
                    <img src="${article.urlToImage}" class="rounded" alt="rover" />
                    </div>
                    <div class="card-body">
                    <span class="tag tag-teal">${article.source.name}</span>
                    <h6 class="mt-2">
                        ${article.title}
                    </h6>
                    <p>
                        ${article.description}
                    </p>
                    <a href="${article.url}" style="font-size:14px; color:blue; " target="_blank">Read more</a>
                    <div class="user">
                            <div class="user-info">
                
                        <small>${article.publishedAt}</small>
                        </div>
                    </div>
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


