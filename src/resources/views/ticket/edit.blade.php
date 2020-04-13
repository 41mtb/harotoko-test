@extends('layouts.app')

@section('title')Tellad｜スペース編集 @endsection

@section('content')
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
            <span class="h5 font-weight-bold">チケットの登録<span>
        </div>
        <form method="POST"  class="h-adr" action="{{ route('ticket.update', ['ticket' => $ticket->id ] ) }}"enctype="multipart/form-data" onsubmit="return submitChk()">
        @csrf
        @method('PUT')
        <div class="mx-auto">
            <div class='row'>
                <div class="form-group col-md-6">
                    <label>登録店舗を選択する</label>
                    <select id='shop_id' class='form-control' name = 'shop_id'>
                        @foreach($user->shops as $shop)
                            <option value = {{$shop->id}} >{{$shop->shop_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class='form-group col-md-6'>
                    <label >チケットタイプを選択する</label>
                    <select id='type' class='form-control' name = 'type'>
                        <option value = 0 >単品チケット</option>
                        <option value = 1 >割引チケット</option>
                        <option value = 2 >まとめ買いチケット（２枚）</option>
                        <option value = 5 >まとめ買いチケット（５枚）</option>
                        <option value = 10 >まとめ買いチケット（１０枚）</option>
                    </select>
                    <a class='mt-0 float-right' href='/'><small><br>チケットタイプとは</small></a>
                </div>
            </div>
            <div class="form-group row">
                   <div class='col-md-4'>
                       <h5>現在の画像：</h5>
                        @foreach($ticket->ticketImages as $image)
                            <div class="d-inline-block mr-1 mt-1">
                                <img class="img-thumbnail" src='{{$image->real_path}}?<?= uniqid() ?>' style="height:50px;" >
                            </div>
                        @endforeach
                   </div> 
                <div class="col-md-8">
                    <label for="file">チケットの画像（複数枚可・最大３枚）</label>
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
            <div class='row'>
                <div class="form-group col-md-6">
                    <input id="title" placeholder='チケット名' type="text" class="form-control fform-control-sm" name = "title" value="{{ old('title') }}">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control fform-control-sm" placeholder="金額" name = "price" value="{{ old('price') }}">
                </div>
            </div>
            <div class='row'>
                <div class="form-group col-md-3 text-center">
                    チケットの説明
                </div>
                <div class="form-group col-md-9">
                    <textarea id="ad_characteristic" type="textarea" class="form-control fform-control-sm" rows="4" placeholder="チェーン店と比較し、メニューの価格は少し高め。30代女性が主な顧客で、ランチやパーティー会場としてよく使われている。" name = "description" value="{{ old('description') }}"></textarea>
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="px-5 btn btn-primary" value="チケットを登録する">
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