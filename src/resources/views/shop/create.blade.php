@extends('layouts.app')

@section('title')harotoko｜店舗登録 @endsection

@section('content')
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-md-6 mx-auto">
        <div class="text-center card-header my-3">
            <span class="h5 font-weight-bold">店舗登録<span>
        </div>
        <form method="POST"  class="h-adr" action="{{ route('shop.store') }}" enctype="multipart/form-data" onsubmit="return submitChk()">
        @csrf
        <div class="mx-auto">
             <div class="form-group row">
                <div class="col-md-8">
                    <label for="file">店舗の画像（複数枚可・最大３枚）</label>
                    <div id="file" class="input-group 2">
                        <div class="custom-file">
                            <input type="file" id="file" class="custom-file-input 1" name="files[]" multiple />
                            <label class="custom-file-label 3" for="customfile" data-browse="参照">ファイル選択...</label>
                        </div>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-primary reset 4">取消</button>
                        </div>
                    </div>
                </div>
            </div>
            <input id="user_id" type="hidden" name = "user_id" value="{{ $user['id'] }}">
            <div class='row'>
                <div class="form-group col-md-6">
                    <input id="shop_name" placeholder='店舗名' type="text" class="form-control fform-control-sm" name = "shop_name" value="{{ old('shop_name') }}">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control fform-control-sm" placeholder="代表者名" name = "name" value="{{ old('name') }}">
                </div>
            </div>
            <div class='row'>
                <div class="form-group col-md-6">
                    <input placeholder='店舗HP' type="text" class="form-control fform-control-sm" name = "url" value="{{ old('url') }}">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control fform-control-sm" placeholder="メールアドレス" name = "email" value="{{ old('email') }}">
                </div>
            </div>
            <div class='row'>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control fform-control-sm" placeholder="携帯電話番号" name = "mobile" value="{{ old('mobile') }}">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" placeholder="電話番号"  class="form-control fform-control-sm" name = "phone" value="{{ old('phone') }}">
                </div>
            </div>
            <div class='row'>
                <div class="form-group col-md-6"> 
                    <span class="p-country-name" style="display:none;">Japan</span>
                    <input type="text" class="form-control fform-control-sm p-postal-code" placeholder="郵便番号"  size="8" maxlength="8" name = "postcode" value="{{ old('postcode') }}">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" placeholder="住所（都道府県）"  class="p-region form-control fform-control-sm" name = "prefecture" value="{{ old('prefecture') }}">
                </div>
            </div>
            <div class='row'>
                <div class="form-group col-md-6">
                    <input  type="text" class="form-control fform-control-sm p-locality p-street-address" placeholder="住所（市区町村）" name = "city" value="{{ old('city') }}">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" placeholder="住所（番地）"  class="form-control fform-control-sm" name = "block" value="{{ old('block') }}">
                </div>
            </div>
            <div class='row'>
                <div class="form-group col-md-6 row">
                    <label class="col-md-6" for="exampleFormControlSelect1">ジャンル</label>
                    <select name='shop_category' class="col-md-6 form-control form-control-sm" id="exampleFormControlSelect1">
                    @foreach($shopCategories as $shopCategory)
                        <option value={{$shopCategory}}>{{$shopCategory}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <input id="address" type="text" placeholder="店舗キャッチコピー"  class="form-control fform-control-sm" name = "feature" value="{{ old('feature') }}">
                </div>
            </div>
            <div class='row'>
                <div class="form-group col-md-3 text-center">
                    店舗の紹介文
                </div>
                <div class="form-group col-md-9">
                    <textarea id="ad_characteristic" type="textarea" class="form-control fform-control-sm" rows="4" placeholder="チェーン店と比較し、メニューの価格は少し高め。30代女性が主な顧客で、ランチやパーティー会場としてよく使われている。" name = "description" value="{{ old('description') }}"></textarea>
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="px-5 btn btn-primary" value="店舗を登録する">
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    /**
     * 確認ダイアログの返り値によりフォーム送信
    */
    function submitChk () {
        /* 確認ダイアログ表示 */
        var flag = confirm ( "チケットの登録に移ってもよろしいですか？\n\n修正する場合は[キャンセル]ボタンを押して下さい");
        /* send_flg が TRUEなら送信、FALSEなら送信しない */
        return flag;
    };

    $(function(){
        $('.1').on('change', handleFileSelect);
        function handleFileSelect(evt) {
                $('#5').remove();// 繰り返し実行時の処理
                $(this).parents('.2').after('<div id="5"></div>');

            var files = evt.target.files;

            for (var i = 0, f; f = files[i]; i++) {

                var reader = new FileReader();

                reader.onload = (function(theFile) {
                    return function(e) {
                        if (theFile.type.match('image.*')) {
                            var $html = ['<div class="d-inline-block mr-1 mt-1"><img class="img-thumbnail" src="', e.target.result,'" title="', escape(theFile.name), '" style="height:50px;" /></div>'].join('');// 画像では画像のプレビューとファイル名の表示
                        } else {
                            var $html = ['<div class="d-inline-block mr-1"><span class="small">', escape(theFile.name),'</span></div>'].join('');//画像以外はファイル名のみの表示
                        }

                        $('#5').append($html);
                    };
                })(f);

                reader.readAsDataURL(f);
            }
            $(this).next('.3').html(+ files.length + '個のファイルを選択しました');
        }
        //ファイルの取消
        $('.4').click(function(){
            $(this).parent().prev().children('.3').html('ファイル選択...');
            $('#5').remove();
            $('.1').val('');
        })
    });
</script>