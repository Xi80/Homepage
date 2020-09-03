@include("common")

@include("sideMenu")

<body>
    <div class="top">
        <img src="imgs/Logo.png" alt="Logo"/>
        <hr/>

        <h1>電子工作の庭へようこそ！</h1>
        <p>このサイトではLunaが制作したモノや技術メモを閲覧することができます</p>
        <p>あなたは<img src="./counter" alt="accessCounter">人目の訪問者です。</p>

        <hr />
        <h2>更新履歴</h2>
        <textarea rows="5" cols="50" style="border:outset 2px #ccf3ff;scrollbar-base-color:#ffbb77;scrollbar-arrow-color:#ccff88;padding:5px;background:#ccf3ff">
            2020-09-01	トップページを作成
            2020-09-02	トップページをリニューアル
        </textarea>

        <hr />
        <h2>コンテンツについて</h2>
        <div class="contents">
            実際に作るときはAt Your Own Riskでお願いします。
            <table border="1" align="center">
                <tr>
                    <th>管理者について</th>
                    <td>このホームページの管理者であるLunaについてです</td>
                </tr>
                <tr>
                    <th>制作記録</th>
                    <td>Lunaが作ったものについての説明、回路図、ソースなんかが置いてあります</td>
                </tr>
                <tr>
                    <th>技術メモ</th>
                    <td>困ったことについての解決方法や、制作中に学んだ技術について書いてあります。</td>
                </tr>
                <tr>
                    <th>BBS</th>
                    <td>そのまんまです(殴)。現在制作中です。</td>
                </tr>
                <tr>
                    <th>リンクなど</th>
                    <td>今はまだないですが相互リンクなどを貼っていきます。</td>
                </tr>
            </table>
        </div>
    </div>
</body>

@include("footer")
