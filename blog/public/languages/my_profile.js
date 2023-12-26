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
        "post_image": "gg",
        "post_desc" : "описание",
        "msg" : "добавить новый пост ",
        "like" : "Лайк",
        "language": "язык",
        "russian" : "Русский",
        "english" : "Англиский",
        "new_users" : "новые пользователи",
        "you" : "Ты",
        "blog" : "Блог",
        "p_create": "создать",
        "p_close": "Закрыть"

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
        "you": "You",
        "blog": "Blog",
        "p_create": "Create",
        "p_close": "Close"
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