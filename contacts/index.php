<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>


    <section class="section section--order" data-js-scroll-effect data-js-scroll-effect--no-lock>
        <div class="section__body">
            <div class="contact-form">
                <div class="contact-form__aux">
                    <div class="conact-form__title">
                        <h2>Заявка</h2>
                    </div>
                    <div class="contact-form__desc">
                        для консультации<br />
                        или подготовки<br />
                        предложения
                    </div>
                    <div class="contact-form__card-manager">
                        <div class="contact-form__label">
                            Ваши заявки принимает
                        </div>
                        <figure class="card-manager">
                            <figcaption class="card-manager__label">
                                <div class="card-manager__name">
                                    Надежда
                                </div>
                                <div class="card-manager__info">
                                    Коммерческий директор
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="contact-form__desc contact-form__desc--note">
                        Оставьте заявку или позвоните нам, мы сами <br />все за вас заполним <a rel="contact" href="tel:8-800-555-85-89">8-800-555-85-89</a>
                    </div>
                </div>
                <div class="contact-form__main">
                    <?$APPLICATION->IncludeComponent("bitrix:form.result.new","delement",Array(
                            "SEF_MODE" => "", 
                            "WEB_FORM_ID" => "1", 
                            "LIST_URL" => "", 
                            "EDIT_URL" => "", 
                            "SUCCESS_URL" => "", 
                            "CHAIN_ITEM_TEXT" => "", 
                            "CHAIN_ITEM_LINK" => "", 
                            "IGNORE_CUSTOM_TEMPLATE" => "Y", 
                            "USE_EXTENDED_ERRORS" => "Y", 
                            "CACHE_TYPE" => "A", 
                            "CACHE_TIME" => "3600", 
                            "SEF_FOLDER" => "/", 
                            "SHOW_ADDITIONAL" => "Y",
                            "VARIABLE_ALIASES" => Array(
                            ),
                            "EMAIL_TO" => "web.repin@yandex.ru",
                        )
                    );?>
                </div>
            </div>
        </div>
    </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>