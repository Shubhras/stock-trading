@extends('layouts.backend')

@section('title')
{{ __('Users Request Point') }}
@endsection

@section('content')

<style>
    .fund_done{
        -webkit-box-shadow: 0 0 0 1px #2185d0 inset!important;
    box-shadow: 0 0 0 1px #2185d0 inset!important;
    color: #5cb85c!important;
    }

    /* .ui.basic.blue.buttonsss, .ui.basic.blue.buttons .buttonsss {
    -webkit-box-shadow: 0 0 0 1px #2185d0 inset!important;
    box-shadow: 0 0 0 1px #2185d0 inset!important;
    color: #5cb85c!important; */
}
</style>
<div class="ui one column stackable grid container">

    <div class="column">
        <table class="ui selectable tablet stackable {{ $inverted }} table">
            <thead>
                <tr>
                    @component('components.tables.sortable-column', ['id' => 'id', 'sort' => $sort, 'order' => $order])
                    {{ __('users.id') }}
                    @endcomponent
                    @component('components.tables.sortable-column', ['id' => 'name', 'sort' => $sort, 'order' => $order])
                    {{ __('users.name') }}
                    @endcomponent
                    @component('components.tables.sortable-column', ['id' => 'email', 'sort' => $sort, 'order' => $order])
                    {{ __('users.email') }}
                    @endcomponent
                    @component('components.tables.sortable-column', ['id' => 'status', 'sort' => $sort, 'order' => $order])
                    {{ __('users.status') }}
                    @endcomponent
                    @component('components.tables.sortable-column', ['id' => 'last_login_time', 'sort' => $sort, 'order' => $order])
                    {{ __('Fund Request') }}
                    @endcomponent

                    @component('components.tables.sortable-column', ['id' => 'last_login_time', 'sort' => $sort, 'order' => $order])
                    {{ __('Release Fund') }}
                    @endcomponent

                    @component('components.tables.sortable-column', ['id' => 'last_login_time', 'sort' => $sort, 'order' => $order])
                    {{ __('Point Request Date') }}
                    @endcomponent

                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($users as $user) { 
                    $last_update_point= $user->last_request_point_update;
                    
                    if(empty($last_update_point)){
    
                    ?>

                    <tr>
                        <td><?php echo  $user->request_id ?></td>
                        <td> <?php echo $user->name ?>
                        </td>
                        <td><?php echo $user->email ?></td>
                        <td data-title="{{ __('users.status') }}"><i class="{{ $user->status == App\Models\User::STATUS_ACTIVE ? 'check green' : 'red ban' }} large icon"></i> {{ __('users.status_' . $user->status) }}</td>

                        <td><?php echo $user->fund_request ?></td>

                        <td><?php echo $user->release_fund ?></td>

                        <td><?php echo $user->created_at ?></td>
                        <?php $user_request =$user->request_id;?>
                    
                        <td class="right aligned tablet-and-below-center">
                            <a class="ui icon {{ $settings->color }} basic button" href="{{ route('backend.users_request_point.edit', $user_request,) }}">
                                <i class="edit icon"></i>
                                Release fund    
                            </a>
                        </td>


                    </tr>
                    <?php  }else {
                        ?>

                        <tr>
                        <td><?php echo  $user->request_id ?></td>
                        <td> <?php echo $user->name ?>
                        </td>
                        <td><?php echo $user->email ?></td>
                        <td data-title="{{ __('users.status') }}"><i class="{{ $user->status == App\Models\User::STATUS_ACTIVE ? 'check green' : 'red ban' }} large icon"></i> {{ __('users.status_' . $user->status) }}</td>

                        <td><?php echo $user->fund_request ?></td>

                        <td><?php echo $user->release_fund ?></td>

                        <td><?php echo $user->created_at ?></td>
                        <?php $user_request =$user->request_id;?>
                    
                        <td class="right aligned tablet-and-below-center"> 
                            <button class="btn btn-success" style="color: #5cb85c!important;background:white; border: 1px solid; height: 31px; border-radius: 5px;">
                                <!-- <i class="edit icon"></i> -->
                                <i class="{{ $user->status == App\Models\User::STATUS_ACTIVE ? 'check green' : 'red ban' }} large icon"></i>
                                Fund Done  
                            </button>
                        </td>


                    </tr>
                <?php } } ?>
            </tbody>
        </table>
    </div>

</div>
@endsection