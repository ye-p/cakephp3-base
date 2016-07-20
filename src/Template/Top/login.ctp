<?= $this->Form->create() ?>
                    <div class="loginTbl">
                                <div>ご契約ID<span class="must">必須</span></div>
                                    <?= $this->Form->input('login_id', ['type' => 'text', 'label' => false, 'class' => 'imeOff btm5']) ?>
                                    <div><p class="size10">※半角英数でご入力ください。<br>
                                    ※ご契約ＩＤとは、ご登録時ご入力いただいたメールアドレスです。</p></div>

                                <div>パスワード<span class="must">必須</span></div>
                                    <?= $this->Form->input('password', ['class' => 'imeOff btm5', 'label' => false]) ?>
                                    <div><p class="size10">※半角英数でご入力ください。</p></div>
                    </div>
                    <!--loginTbl-->
                    <p class="center">
                        <?= $this->Form->button('ログインする', ['class' => 'btn_blue']) ?>
                    </p>
