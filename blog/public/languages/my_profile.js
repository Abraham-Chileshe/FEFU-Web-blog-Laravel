var dictionary = {
    "ru": { // when language is not supported
        "logout": "выход",
        "home": "главный",
        "create": "создать новую запись",
        "joined" : "Cоздано",
        "VK": "ссылка на вк",
        "dob": "д.рождения: ",
        "gender": "Пол :",
        "post_title": "заглавие",
        "post_image": "изображение",
        "post_desc" : "описание",
        "msg" : "добавить новый пост ",
        "like" : "Лайк",
        "language": "язык",
        "russian" : "Русский",
        "english" : "Англиский",
        "new_users" : "пользователи",
        "youpost" : "Вы",
        "blog" : "БЛОГ",
        "p_create": "создать",
        "p_close": "Закрыть",
        "news" : "последние новости",
        "news_name": "Новости",
        "blog_p" : "Посты",
        "survey" : "Опрос",
        "form": "Форма опроса",
        "you": "Кто Вы?",
        "name": "Имя:",
        "email": "Почта:",
        "age": "Возраст:",
        "rate": "Как бы вы оценили наш сайт?",
        "rating": "рейтинг",
        "country": "Страна",
        "visit": "Как часто вы посещаете наш сайт",
        "rarely": "редко",
        "sometimes": "иногда",
        "always": "Всегда",
        "say_something": "Хотите что-то сказать?",
        "interest": "что вас интересует",
        "news": "Новости",
        "posts": "Посты",
        "design": "дизайн",
        "adminpanel": "Админ",
        

    },
    "en": {
        "logout": "logout",
        "home": "Home",
        "create": "Create new Post",
        "joined": "Joined",
        "VK": "Vk link",
        "dob": "DoB : ",
        "gender" : "Gender :",
        "post_title": "Title",
        "post_image": "Image",
        "post_desc" : "Description",
        "msg" : "Add New Post",
        "like" : "Like",
        "language": "language",
        "russian" : "Russian",
        "english" : "English",
        "new_users" : "NEW USERS",
        "youpost": "You",
        "blog": "Blog",
        "p_create": "Create",
        "p_close": "Close",
        "news" : "Latest News",
        "news_name": "News",
        "blog_p" : "Publication",
        "survey" : "Survey",
        "form": "Survey Form",
        "you": "Who are you?",
        "name": "Name:",
        "email": "Email:",
        "age": "Age:",
        "rate": "How would you rate our site?",
        "rating": "Rating",
        "country" : "Country",
        "visit" : "How often do you visit our site",
        "rarely": "Rarely",
        "sometimes": "Sometimes",
        "always": "Always",
        "say_something": "Have something to say?",
        "interest": "What are you interested in?",
        "news": "News",
        "posts": "Posts",
        "design": "Design",
        "adminpanel": "Admin",
        
    }
}

class HTMLLocalizer {
    constructor() {
        customElements.define('localized-text', LocalizedTextElement);
    }
}

class LocalizedTextElement extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        var key = this.hasAttribute('key') ? this.getAttribute('key') : ''; 
        var lang = this.hasAttribute('lang') ? this.getAttribute('lang') : this.getLang();
        this.innerHTML = this.translate(key, lang);
    }

    getLang() {
        var lang = (navigator.languages != undefined)?navigator.languages[0]:navigator.language;
        // Ignore country code (example: en-US -> en)
        return lang.split("-")[0];
    }
    
    translate(key, lang) {
        return (lang in dictionary)?dictionary[lang][key]:dictionary['_'][key];
    }
}
  
new HTMLLocalizer();