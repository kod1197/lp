<?php
/**
 * Created by PhpStorm.
 * User: kibir
 * Date: 03.12.2017
 * Time: 12:20
 */

$supermodal = '
<!-- super signup & signin modal -->

                    <div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
                        <div class="cd-user-modal-container"> <!-- this is the container wrapper -->
                            <ul class="cd-switcher">
                                <li><a href="#0">Авторизация</a></li>
                                <li><a href="#0">Новый аккаунт</a></li>
                            </ul>

                            <div id="cd-login"> <!-- log in form -->
                                <form class="cd-form">
                                    <p class="fieldset">
                                        <i class="fa fa-user image-replace" aria-hidden="true"></i>
                                        <input class="full-width has-padding has-border" id="login" type="text" placeholder="Логин">
                                        <span class="cd-error-message">Ошибка!</span>
                                    </p>

                                    <p class="fieldset">
                                        <i class="fa fa-key image-replace" aria-hidden="true"></i>
                                        <input class="full-width has-padding has-border" id="pwd" type="password"  placeholder="Пароль">
                                        <span class="cd-error-message">Ошибка!</span>
                                    </p>
                                    <p id="aerrors"></p>
                                    <p class="fieldset">
                                        <input class="full-width" type="submit" value="Вход" onclick="doAuth()">
                                    </p>
                                </form>

                                <p class="cd-form-bottom-message"><a href="#0">Забыли пароль?</a></p>
                                <!-- <a href="#0" class="cd-close-form">Close</a> -->
                            </div> <!-- cd-login -->

                            <div id="cd-signup"> <!-- sign up form -->
                                <form class="cd-form">
                                    <p class="fieldset">
                                        <i class="fa fa-user image-replace" aria-hidden="true"></i>
                                        <input class="full-width has-padding has-border" id="rlogin" type="text" placeholder="Логин">
                                        <span class="cd-error-message">Ошибка!</span>
                                    </p>

                                    <p class="fieldset">
                                        <i class="fa fa-envelope image-replace" aria-hidden="true"></i>
                                        <input class="full-width has-padding has-border" id="remail" type="text" placeholder="E-mail">
                                        <span class="cd-error-message">Ошибка!</span>
                                    </p>

                                    <p class="fieldset">
                                        <i class="fa fa-key image-replace" aria-hidden="true"></i>
                                        <input class="full-width has-padding has-border" id="rpassword" type="password"  placeholder="Пароль">
                                        <span class="cd-error-message">Ошибка!</span>
                                    </p>
                                    <p class="fieldset">
                                        <i class="fa fa-key image-replace" aria-hidden="true"></i>
                                        <input class="full-width has-padding has-border" id="rpassword_2" type="password"  placeholder="Повторите пароль">
                                        <span class="cd-error-message">Ошибка!</span>
                                    </p>
                                    <p class="fieldset">
                                        <i class="fa fa-briefcase image-replace" aria-hidden="true"></i>
                                        <input class="full-width has-padding has-border" id="rsecret" type="text"  placeholder="Секретное слово">
                                        <span class="cd-error-message">Ошибка!</span>
                                    </p>

                                    <p class="fieldset">
                                        <input type="checkbox" id="check" value="agreed">
                                        <label for="accept-terms">Я прочитал и принимаю <a target="_blank" href="https://kod1197.ru/lp/license.php">лицензионное соглашение</a></label>
                                    </p>
                                    <p id="rerrors"></p>
                                    <p class="fieldset">
                                        <input class="full-width has-padding" type="submit" value="Зарегистрироваться" id="sendbtn" onclick="doSignup()">
                                    </p>
                                </form>

                                <!-- <a href="#0" class="cd-close-form">Close</a> -->
                            </div> <!-- cd-signup -->

                            <div id="cd-reset-password"> <!-- reset password form -->
                                <p class="cd-form-message">Для восстановления доступа к аккаунту введите Ваш email и секретное слово</p>

                                <form class="cd-form">
                                    <p class="fieldset">
                                        <i class="fa fa-envelope image-replace" aria-hidden="true"></i>
                                        <input class="full-width has-padding has-border" id="reset_email" type="email" placeholder="E-mail">
                                        <span class="cd-error-message">Ошибка!</span>
                                    </p>
                                    <p class="fieldset">
                                        <i class="fa fa-briefcase image-replace" aria-hidden="true"></i>
                                        <input class="full-width has-padding has-border" id="secret_word" type="text" placeholder="Секретное слово">
                                        <span class="cd-error-message">Ошибка!</span>
                                    </p>
                                    <p id="errors"></p>
                                    <p class="fieldset">
                                        <input class="full-width has-padding" type="submit" value="Восстановить пароль" onclick="doReset()">
                                    </p>
                                </form>

                                <p class="cd-form-bottom-message"><a href="#0">Возврат к логину</a></p>
                            </div> <!-- cd-reset-password -->
                            <a href="#0" class="cd-close-form">Закрыть</a>
                        </div> <!-- cd-user-modal-container -->
                    </div> <!-- cd-user-modal -->

                </div>
            </div>

';

?>