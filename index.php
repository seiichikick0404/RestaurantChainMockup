<!DOCTYPE html>
<html>
<head>
    <title>入力フォーム</title>
    <!-- Bootstrap CSSの読み込み -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
        <h2>Restaurant-Chain-Mockup 入力フォーム</h2>
        <form action="./download.php" method="post">
            <!-- 従業員数の選択 -->
            <div class="form-group">
                <label for="locationCount">従業員数</label>
                <input type="number" name="employeeCount" class="form-control" id="locationCount" value="3" required>
            </div>

            <!-- 給与範囲の選択（ドル表記） -->
            <div class="form-group">
                <label for="salaryRange">給与範囲（ドル）</label>
                <select class="form-control" id="salaryRange" name="salaryRange" required>
                    <option value="30000">$30,000-$49,999</option>
                    <option value="50000">$50,000-$69,999</option>
                    <option value="70000">$70,000-$89,999</option>
                    <option value="90000">$90,000+</option>
                </select>
            </div>

            <!-- 場所の数の入力 -->
            <div class="form-group">
                <label for="locationCount">ロケーションの数</label>
                <input type="number" class="form-control" id="locationCount" name="locationCount" value="3" required>
            </div>

            <!-- 郵便番号範囲の設定 -->
            <div class="form-group">
                <label for="postalCodeMin">郵便番号 最小値</label>
                <input type="text" class="form-control" id="postalCodeMin" name="postalCodeMin" pattern="[0-9]{3}-[0-9]{4}" placeholder="123-4567" required>
                <label for="postalCodeMax">郵便番号 最大値</label>
                <input type="text" class="form-control" id="postalCodeMax" name="postalCodeMax" pattern="[0-9]{3}-[0-9]{4}" placeholder="123-4567" required>
            </div>

            <!-- ファイルタイプの選択 -->
            <div class="form-group">
                <label>ファイルタイプ</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="fileType" id="html" value="html" checked>
                        <label class="form-check-label" for="html">HTML</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="fileType" id="json" value="json">
                        <label class="form-check-label" for="json">JSON</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="fileType" id="txt" value="txt">
                        <label class="form-check-label" for="txt">TXT</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="fileType" id="markdown" value="markdown">
                        <label class="form-check-label" for="markdown">Markdown</label>
                    </div>
                </div>
            </div>

            <!-- 送信ボタン -->
            <button type="submit" class="btn btn-primary">送信</button>
        </form>
    </div>

    <!-- Bootstrap JSと依存関係の読み込み -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>

