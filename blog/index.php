<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Блог");
$APPLICATION->SetPageProperty("PAGE_CLASS", 'page--blog page-blog page-blog--new');
?>

<?$APPLICATION->IncludeComponent("bitrix:news", "blog", array(
	"IBLOCK_TYPE" => "blog",
	"IBLOCK_ID" => "10",
	"NEWS_COUNT" => "3",
	"USE_SEARCH" => "Y",
	"USE_RSS" => "Y",
	"NUM_NEWS" => "20",
	"NUM_DAYS" => "30",
	"YANDEX" => "N",
	"USE_RATING" => "N",
	"USE_CATEGORIES" => "N",
	"USE_REVIEW" => "Y",
	"MESSAGES_PER_PAGE" => "10",
	"USE_CAPTCHA" => "Y",
	"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
	"FORUM_ID" => "4",
	"URL_TEMPLATES_READ" => "",
	"SHOW_LINK_TO_FORUM" => "N",
	"POST_FIRST_MESSAGE" => "N",
	"USE_FILTER" => "N",
	"SORT_BY1" => "PROPERTY_PARTMAIN",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "ACTIVE_FROM",
	"SORT_ORDER2" => "DESC",
	"CHECK_DATES" => "Y",
	"SEF_MODE" => "Y",
	"SEF_FOLDER" => "/blog/",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_SHADOW" => "Y",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "N",
	"SET_TITLE" => "Y",
	"SET_STATUS_404" => "Y",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
	"ADD_SECTIONS_CHAIN" => "Y",
	"USE_PERMISSIONS" => "N",
	"PREVIEW_TRUNCATE_LEN" => "",
	"LIST_ACTIVE_DATE_FORMAT" => "j F Y",
	"LIST_FIELD_CODE" => array(
		0 => "SHOW_COUNTER",
        1 => "CREATED_USER_NAME",
	),
	"LIST_PROPERTY_CODE" => array(
		0 => "FORUM_MESSAGE_CNT",
		1 => "",
	),
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"DISPLAY_NAME" => "N",
	"META_KEYWORDS" => "-",
	"META_DESCRIPTION" => "-",
	"BROWSER_TITLE" => "NAME",
	"DETAIL_ACTIVE_DATE_FORMAT" => "j F Y",
	"DETAIL_FIELD_CODE" => array(
		0 => "PREVIEW_PICTURE",
		1 => "SHOW_COUNTER",
	),
	"DETAIL_PROPERTY_CODE" => array(
		0 => "LINK_SOURCE",
		1 => "THEME",
		2 => "GALEERY",
	),
	"DETAIL_DISPLAY_TOP_PAGER" => "N",
	"DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
	"DETAIL_PAGER_TITLE" => "Страница",
	"DETAIL_PAGER_TEMPLATE" => "",
	"DETAIL_PAGER_SHOW_ALL" => "N",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "blog",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"USE_SHARE" => "Y",
	"DISPLAY_IMG_WIDTH" => "80",
	"DISPLAY_IMG_HEIGHT" => "56",
	"DISPLAY_IMG_MEDIUM_WIDTH" => "136",
	"DISPLAY_IMG_MEDIUM_HEIGHT" => "101",
	"DISPLAY_IMG_DETAIL_WIDTH" => "298",
	"DISPLAY_IMG_DETAIL_HEIGHT" => "221",
	"AJAX_OPTION_ADDITIONAL" => "",
    "COUNT_WORDS" => "20",
	"SEF_URL_TEMPLATES" => array(
		"news" => "",
		"section" => "",
		"detail" => "#ELEMENT_CODE#/",
		"search" => "search/",
		"rss" => "rss/",
		"rss_section" => "#SECTION_CODE#/rss/",
	)
	),
	false
);?> 
<br />



<?/*
<div class="section">
    <div class="section__body">

        <div class="page-blog__ctrl">

            <div class="page-blog__collapse-wrapper" data-js-expand='{"visibleItems":"10"}'>
                <div class="page-blog__ctrl-row">
                    <div class="page-blog__no-collapse-row">
                        <form class="form page-blog__form" action id="search-form" data-js-search-form>
                            <div class="form-row">
                                <input class="form-input" type="search" name="q" placeholder="Поиск статей" />
                                <button class="btn" type="submit">
                                    <span class="visually-hidden">Найти</span>
                                    <svg class="i-icon btn__icon">
                                        <use href="#icon-search-2"></use>
                                    </svg>
                                </button>
                            </div>
                        </form>

                        <button class="page-blog__collapse-button" data-js-expand-btn>
                            <span class="show-more">Ещё тэги</span>
                            <svg class="page-blog__collapse-btn-icon show-more" width="15" height="10">
                                <use href="#icon-arrow"></use>
                            </svg>

                            <span class="show-less">Скрыть тэги</span>
                            <svg class="page-blog__collapse-btn-icon show-less" width="15" height="10">
                                <use href="#icon-arrow"></use>
                            </svg>
                        </button>
                    </div>

                    <div class="page-blog__collapse-container">
                        <div class="tags tags-slider">
                            <div class="tags__container swiper-container ">
                                <div class="tags__wrapper swiper-wrapper" data-js-expand-item-container>


                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="yandeks-metrika" class="checkbox__input" form="search-form" type="radio"
                                                   value="yandeks-metrika" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                                   checked

                                            >
                                            <span class="checkbox__emulator">Яндекс.Метрика</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="internet-magazin" class="checkbox__input" form="search-form" type="radio"
                                                   value="internet-magazin" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Интернет-магазин</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="sarafannyy-marketing" class="checkbox__input" form="search-form" type="radio"
                                                   value="sarafannyy-marketing" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Сарафанный маркетинг</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="digital-marketing" class="checkbox__input" form="search-form" type="radio"
                                                   value="digital-marketing" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Digital маркетинг</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="mobilnoe-prilozhenie" class="checkbox__input" form="search-form" type="radio"
                                                   value="mobilnoe-prilozhenie" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Мобильное приложение</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="yandeks-direkt" class="checkbox__input" form="search-form" type="radio"
                                                   value="yandeks-direkt" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Яндекс.Директ</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="biznes" class="checkbox__input" form="search-form" type="radio"
                                                   value="biznes" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Бизнес</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="kontent-marketing" class="checkbox__input" form="search-form" type="radio"
                                                   value="kontent-marketing" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Контент-маркетинг</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="smm" class="checkbox__input" form="search-form" type="radio"
                                                   value="smm" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">SMM</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="rassylka" class="checkbox__input" form="search-form" type="radio"
                                                   value="rassylka" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Рассылка</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="tekstovaya-optimizatsiya" class="checkbox__input" form="search-form" type="radio"
                                                   value="tekstovaya-optimizatsiya" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Текстовая оптимизация</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="seo" class="checkbox__input" form="search-form" type="radio"
                                                   value="seo" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">SEO</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="instagramm" class="checkbox__input" form="search-form" type="radio"
                                                   value="instagramm" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Инстаграмм</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="marketpleys" class="checkbox__input" form="search-form" type="radio"
                                                   value="marketpleys" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Маркетплейс</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="kolltreking" class="checkbox__input" form="search-form" type="radio"
                                                   value="kolltreking" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Коллтрекинг</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="elektronnaya-kommertsiya" class="checkbox__input" form="search-form" type="radio"
                                                   value="elektronnaya-kommertsiya" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Электронная коммерция</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="analiz-konkurentov" class="checkbox__input" form="search-form" type="radio"
                                                   value="analiz-konkurentov" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Анализ конкурентов</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="omnikanalnyy-marketing" class="checkbox__input" form="search-form" type="radio"
                                                   value="omnikanalnyy-marketing" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Омниканальный маркетинг</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="prodvizhenie" class="checkbox__input" form="search-form" type="radio"
                                                   value="prodvizhenie" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Продвижение</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="growth-hacking" class="checkbox__input" form="search-form" type="radio"
                                                   value="growth-hacking" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Growth hacking</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="cjm" class="checkbox__input" form="search-form" type="radio"
                                                   value="cjm" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">CJM</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="yuzabiliti" class="checkbox__input" form="search-form" type="radio"
                                                   value="yuzabiliti" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Юзабилити</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="kontekstnaya-reklama" class="checkbox__input" form="search-form" type="radio"
                                                   value="kontekstnaya-reklama" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Контекстная реклама</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="targetirovannaya-reklama" class="checkbox__input" form="search-form" type="radio"
                                                   value="targetirovannaya-reklama" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Таргетированная реклама</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="mikrorazmetka" class="checkbox__input" form="search-form" type="radio"
                                                   value="mikrorazmetka" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Микроразметка</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="tik-tok" class="checkbox__input" form="search-form" type="radio"
                                                   value="tik-tok" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">ТИК ТОК</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="semanticheskoe-yadro" class="checkbox__input" form="search-form" type="radio"
                                                   value="semanticheskoe-yadro" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Семантическое ядро</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="b2b" class="checkbox__input" form="search-form" type="radio"
                                                   value="b2b" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">B2B</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="e-commerce" class="checkbox__input" form="search-form" type="radio"
                                                   value="e-commerce" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Е-Сommerce</span>
                                        </label>
                                    </div>

                                    <div class="tags__item swiper-slide">
                                        <label class="checkbox">
                                            <input id="yandeks-dzen" class="checkbox__input" form="search-form" type="radio"
                                                   value="yandeks-dzen" name="tag" tabindex="-1"
                                                   data-input-required="checkbox"

                                            >
                                            <span class="checkbox__emulator">Яндекс. Дзен</span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="h3 hidden">Извините, по вашему запросу ничего не найдено</div>

        <div class=" page-blog__cards">



            <article class="card-post card-post--new card-post--full ">
                <div class="card-post__img">
                    <img src="/local/templates/delement/frontend/assets/images/2.png"
                         alt="Как предоставить доступ к Яндекс Директ и Google Adwords">
                </div>
                <div class="card-post__info ">
                    <div class="card-post__summary article-summary">
                        <ul class="article-summary__hashtag-list">
                            <li class="article-summary__hashtag-item">
                                <a href="#" class="article-summary__hashtag-link">интернет-маркетинг</a>
                            </li>
                        </ul>
                    </div>
                    <a href="" class="card-post__link">
                        <h3 class="card-post__title">Как бесплатно продвинуть мобильное приложение</h3>
                    </a>
                    <div class="card-post__preview-text">
                        <p>
                            Контекстная реклама — один из самых простых и быстрых способов
                            увеличения посещений веб-сайта. Особенностью этого инструмента
                            является понятность работы и финансовая доступность.
                        </p>
                    </div>
                    <div class="card-post__bottom article-summary">
                        <div class="article-summary__info-block">
                  <span class="article-summary__author">
                    Александр Константинопольский
                  </span>
                            <time datetime="2022-01-28" class="article-summary__info-text">
                                28.ЯНВ.2022
                            </time>
                        </div>
                        <div class="pull-right article-summary__info-text article-summary__info-text--with-icon">
                            50
                            <span class="article-summary__info-icon article-summary__info-icon--eye">
                    <svg width="22" height="22">
                      <use href="#icon-eye-3"></use>
                    </svg>
                  </span>
                        </div>
                    </div>
                </div>
            </article>

            <article class="card-post card-post--new card-post--full ">
                <div class="card-post__img">
                    <img src="/local/templates/delement/frontend/assets/images/2.png"
                         alt="Как предоставить доступ к Яндекс Директ и Google Adwords">
                </div>
                <div class="card-post__info ">
                    <div class="card-post__summary article-summary">
                        <ul class="article-summary__hashtag-list">
                            <li class="article-summary__hashtag-item">
                                <a href="#" class="article-summary__hashtag-link">интернет-маркетинг</a>
                            </li>
                        </ul>
                    </div>
                    <a href="" class="card-post__link">
                        <h3 class="card-post__title">Как бесплатно продвинуть мобильное приложение и ещё что-нибудь, и ещё чтоинибудь</h3>
                    </a>
                    <div class="card-post__preview-text">
                        <p>
                            Контекстная реклама — один из самых простых и быстрых способов
                            увеличения посещений веб-сайта. Особенностью этого инструмента
                            является понятность работы и финансовая доступность.
                        </p>
                    </div>
                    <div class="card-post__bottom article-summary">
                        <div class="article-summary__info-block">
                  <span class="article-summary__author">
                    Александр Константинопольский
                  </span>
                            <time datetime="2022-01-28" class="article-summary__info-text">
                                28.ЯНВ.2022
                            </time>
                        </div>
                        <div class="pull-right article-summary__info-text article-summary__info-text--with-icon">
                            50
                            <span class="article-summary__info-icon article-summary__info-icon--eye">
                    <svg width="22" height="22">
                      <use href="#icon-eye-3"></use>
                    </svg>
                  </span>
                        </div>
                    </div>
                </div>
            </article>

            <article class="card-post card-post--new card-post--full ">
                <div class="card-post__img">
                    <img src="/local/templates/delement/frontend/assets/images/2.jpg"
                         alt="Как предоставить доступ к Яндекс Директ и Google Adwords">
                </div>
                <div class="card-post__info ">
                    <div class="card-post__summary article-summary">
                        <ul class="article-summary__hashtag-list">
                            <li class="article-summary__hashtag-item">
                                <a href="#" class="article-summary__hashtag-link">интернет-маркетинг</a>
                            </li>
                        </ul>
                    </div>
                    <a href="" class="card-post__link">
                        <h3 class="card-post__title">Как бесплатно продвинуть мобильное приложение</h3>
                    </a>
                    <div class="card-post__preview-text">
                        <p>
                            Контекстная реклама — один из самых простых и быстрых способов
                            увеличения посещений веб-сайта. Особенностью этого инструмента
                            является понятность работы и финансовая доступность.
                        </p>
                    </div>
                    <div class="card-post__bottom article-summary">
                        <div class="article-summary__info-block">
                  <span class="article-summary__author">
                    Александр Константинопольский
                  </span>
                            <time datetime="2022-01-28" class="article-summary__info-text">
                                28.ЯНВ.2022
                            </time>
                        </div>
                        <div class="pull-right article-summary__info-text article-summary__info-text--with-icon">
                            50
                            <span class="article-summary__info-icon article-summary__info-icon--eye">
                    <svg width="22" height="22">
                      <use href="#icon-eye-3"></use>
                    </svg>
                  </span>
                        </div>
                    </div>
                </div>
            </article>

            <article class="card-post card-post--new card-post--full ">
                <div class="card-post__img">
                    <img src="/local/templates/delement/frontend/assets/images/2.png"
                         alt="Как предоставить доступ к Яндекс Директ и Google Adwords">
                </div>
                <div class="card-post__info ">
                    <div class="card-post__summary article-summary">
                        <ul class="article-summary__hashtag-list">
                            <li class="article-summary__hashtag-item">
                                <a href="#" class="article-summary__hashtag-link">интернет-маркетинг</a>
                            </li>
                        </ul>
                    </div>
                    <a href="" class="card-post__link">
                        <h3 class="card-post__title">Как бесплатно продвинуть мобильное приложение</h3>
                    </a>
                    <div class="card-post__preview-text">
                        <p>
                            Контекстная реклама — один из самых простых и быстрых способов
                            увеличения посещений веб-сайта. Особенностью этого инструмента
                            является понятность работы и финансовая доступность.
                        </p>
                    </div>
                    <div class="card-post__bottom article-summary">
                        <div class="article-summary__info-block">
                  <span class="article-summary__author">
                    Александр Константинопольский
                  </span>
                            <time datetime="2022-01-28" class="article-summary__info-text">
                                28.ЯНВ.2022
                            </time>
                        </div>
                        <div class="pull-right article-summary__info-text article-summary__info-text--with-icon">
                            50
                            <span class="article-summary__info-icon article-summary__info-icon--eye">
                    <svg width="22" height="22">
                      <use href="#icon-eye-3"></use>
                    </svg>
                  </span>
                        </div>
                    </div>
                </div>
            </article>

            <article class="card-post card-post--new card-post--full ">
                <div class="card-post__img">
                    <img src="/local/templates/delement/frontend/assets/images/2.png"
                         alt="Как предоставить доступ к Яндекс Директ и Google Adwords">
                </div>
                <div class="card-post__info ">
                    <div class="card-post__summary article-summary">
                        <ul class="article-summary__hashtag-list">
                            <li class="article-summary__hashtag-item">
                                <a href="#" class="article-summary__hashtag-link">интернет-маркетинг</a>
                            </li>
                        </ul>
                    </div>
                    <a href="" class="card-post__link">
                        <h3 class="card-post__title">Как бесплатно продвинуть мобильное приложение и ещё что-нибудь, и ещё чтоинибудь</h3>
                    </a>
                    <div class="card-post__preview-text">
                        <p>
                            Контекстная реклама — один из самых простых и быстрых способов
                            увеличения посещений веб-сайта. Особенностью этого инструмента
                            является понятность работы и финансовая доступность.
                        </p>
                    </div>
                    <div class="card-post__bottom article-summary">
                        <div class="article-summary__info-block">
                  <span class="article-summary__author">
                    Александр Константинопольский
                  </span>
                            <time datetime="2022-01-28" class="article-summary__info-text">
                                28.ЯНВ.2022
                            </time>
                        </div>
                        <div class="pull-right article-summary__info-text article-summary__info-text--with-icon">
                            50
                            <span class="article-summary__info-icon article-summary__info-icon--eye">
                    <svg width="22" height="22">
                      <use href="#icon-eye-3"></use>
                    </svg>
                  </span>
                        </div>
                    </div>
                </div>
            </article>

            <article class="card-post card-post--new card-post--full ">
                <div class="card-post__img">
                    <img src="/local/templates/delement/frontend/assets/images/2.jpg"
                         alt="Как предоставить доступ к Яндекс Директ и Google Adwords">
                </div>
                <div class="card-post__info ">
                    <div class="card-post__summary article-summary">
                        <ul class="article-summary__hashtag-list">
                            <li class="article-summary__hashtag-item">
                                <a href="#" class="article-summary__hashtag-link">интернет-маркетинг</a>
                            </li>
                        </ul>
                    </div>
                    <a href="" class="card-post__link">
                        <h3 class="card-post__title">Как бесплатно продвинуть мобильное приложение</h3>
                    </a>
                    <div class="card-post__preview-text">
                        <p>
                            Контекстная реклама — один из самых простых и быстрых способов
                            увеличения посещений веб-сайта. Особенностью этого инструмента
                            является понятность работы и финансовая доступность.
                        </p>
                    </div>
                    <div class="card-post__bottom article-summary">
                        <div class="article-summary__info-block">
                  <span class="article-summary__author">
                    Александр Константинопольский
                  </span>
                            <time datetime="2022-01-28" class="article-summary__info-text">
                                28.ЯНВ.2022
                            </time>
                        </div>
                        <div class="pull-right article-summary__info-text article-summary__info-text--with-icon">
                            50
                            <span class="article-summary__info-icon article-summary__info-icon--eye">
                    <svg width="22" height="22">
                      <use href="#icon-eye-3"></use>
                    </svg>
                  </span>
                        </div>
                    </div>
                </div>
            </article>

        </div>
        <ul class="pagination pagination--with-navigation" data-js-content-preloader-pagination>

            <li class="pagination__item">
                <a href="#" class="pagination__link pagination__link--prev pagination__link--disabled">
                    <svg class="i-icon">
                        <use xlink:href="#icon-arrow--left"></use>
                    </svg>
                </a>
            </li>
            <li class="pagination__item"><span class="pagination__link pagination__link--current">1</span>
            </li>
            <li class="pagination__item"><a href="#" class="pagination__link">2</a></li>
            <li class="pagination__item"><a href="#" class="pagination__link">3</a></li>
            <li class="pagination__item"><a href="#" class="pagination__link">4</a></li>
            <li class="pagination__item"><a href="#" class="pagination__link">5</a></li>
            <li class="pagination__item"><span
                    class="pagination__link pagination__link--hellip">&hellip;</span></li>
            <li class="pagination__item"><a href="#" class="pagination__link">10</a></li>
            <li class="pagination__item">
                <a href="#" class="pagination__link pagination__link--next">
                    <svg class="i-icon">
                        <use xlink:href="#icon-arrow--right"></use>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</div>

*/?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>