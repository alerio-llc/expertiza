
                    <!-- Здесь выводим контент страницы : --конец-- -->
                </div>
                <!-- Содержимое страницы : --конец-- -->
            </div>
            <!-- Основная часть страницы : --конец-- -->
        </div>
        
        <!-- Обертка : --конец-- -->        
        <?/* Если мы НЕ находимся на главной и НЕ находимся на странице реестров*/?> 
<? if (($APPLICATION->GetCurPage(false) !== '/') and ($pos !== 1)):?>

        <!-- Нижняя панель : --начало-- -->
        <div id="BottomBar">
            <p><a href="http://www.gosnadzor.ru/" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/Img/banners/14.jpg" border="0"></a></p>
            <p><a href="http://www.gov.spb.ru" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/Img/banners/4.jpg" border="0"></a></p>
            <p><a href="http://www.kgainfo.spb.ru/" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/Img/banners/18.gif" border="0"></a></p>
			<p><a href="http://www.hr.gov.spb.ru/" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/Img/banners/gov.jpg" border="0"></a></p>
            <p><a href="http://www.gov.spb.ru/gov/admin/otrasl/komstroy" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/Img/banners/19.jpg" border="0"></a></p>
            <p><a href="http://www.pravo.gov.ru/" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/Img/banners/21.jpg" border="0"></a></p>
        </div>        
        <!-- Нижняя панель : --конец-- -->
        <? endif; ?>
            <!-- Дополнительное меню : --конец-- -->
                        <!-- Основная часть страницы : --начало-- -->


        <!-- Подвал : --начало-- -->
        <div id="Footer">
            <p id="Alerio" ><a href="http://www.alerio.ru/">Разработка сайта - компания «Алерио»</a></p>
        </div>
        <!-- Подвал : --конец-- -->
    </div>
</body>
</html>