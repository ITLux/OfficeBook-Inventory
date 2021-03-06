@extends('layouts.admin')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Адрес</h3>
                    @if (Gate::allows('addresses_edit'))
                    <a href="/admin/addressadd"><button class="btn btn-info pull-right">Создать</button></a>
                    @endif
                </div>
                
                @if($mesalt != '')
                <div class="alert alert-danger">
                    <ul>
                        <li>{{ $mesalt }}</li>
                    </ul>
                </div>
                @endif
                
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th width="25">№</th>
                            <th>Название</th>
                            @if (Gate::allows('addresses'))
                            <th width="25"></th>
                            <th width="25"></th>
                            @endif
                        </tr>

                        <?php $i = 0;?>
                        @foreach ($addresses as $address)
                            <tr>
                                <td><?=$i += 1?></td>
                                <td><a href="/admin/addressin/<?=$address->id?>" title="Посмотреть всеx по этому адресу"><?=$address->name?></a></td>
                                @if (Gate::allows('addresses_edit'))
                                <td><div class="col-md-3 col-sm-4"><a href="/admin/address/<?=$address->id?>" title="Редактировать"><i class="fa fa-fw fa-edit"></i></a></div></td>
                                @endif
                                @if (Gate::allows('addresses_delete'))
                                <td><div class="col-md-3 col-sm-4"><a href="/admin/addressdel/<?=$address->id?>" title="Удалить"><i class="fa fa-fw fa-times"></i></a></div></td>
                                @endif
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection