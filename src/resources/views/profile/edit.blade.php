@extends('layouts.app')

@section('title')harotoko｜プロフィール登録 @endsection

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
            <span class="h5 font-weight-bold">プロフィール登録<span>
        </div>
        <form method="POST"  class="h-adr" action="{{ route('profile.update', ['profile' => $profile->id ] ) }}" enctype="multipart/form-data" onsubmit="return submitChk()">
        @csrf
        @method('PUT')
        <input id="user_id" type="hidden" name = "user_id" value="{{ $user['id'] }}">
            <div class='row'>
                <div class="form-group col-md-6">
                    <input id="real_name" placeholder='本名' type="text" class="form-control fform-control-sm" name = "real_name" value="{{ $profile->real_name }}">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control fform-control-sm" placeholder="生年月日" name = "birthday" value="{{ $profile->birthday }}">
                </div>
            </div>
            <div class='row'>
                <div class="form-group col-md-6"> 
                    <span class="p-country-name" style="display:none;">Japan</span>
                    <input type="text" class="form-control fform-control-sm p-postal-code" placeholder="郵便番号"  size="8" maxlength="8" name = "postcode" value="{{ $profile->postcode }}">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" placeholder="住所（都道府県）"  class="p-region form-control fform-control-sm" name = "prefecture" value="{{ $profile->prefecture }}">
                </div>
            </div>
            <div class='row'>
                <div class="form-group col-md-6">
                    <input  type="text" class="form-control fform-control-sm p-locality p-street-address" placeholder="住所（市区町村）" name = "city" value="{{ $profile->city }}">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" placeholder="住所（番地）"  class="form-control fform-control-sm" name = "block" value="{{ $profile->block }}">
                </div>
            </div>
            <div class='row'>
                <div class="form-group col-md-6">
                    <input type="text" placeholder="電話番号"  class="form-control fform-control-sm" name = "phone" value="{{ $profile->phone }}">
                </div>
                <div class="form-group col-md-6">
                    <input type="submit" class="px-5 btn btn-primary" value="登録">
                </div>
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
        var flag = confirm ( "プロフィールを登録してもよろしいですか？\n\n修正する場合は[キャンセル]ボタンを押して下さい");
        /* send_flg が TRUEなら送信、FALSEなら送信しない */
        return flag;
    };
</script>