@extends('layouts.app')

@section('content')
        <div class="card-body">
            <div class="container-fluid">
                    @if ($recruitBtnView)
                        <a href="{{ route('team.regist') }}" class="btn btn-primary">参加申請</a>
                    @endif
                    @if (Auth::user()->role == config('user.role.admin') && $makeBtnView)
                        <a href="#" class="btn btn-success">対戦表作成</a>
                    @endif
                <table class="table table-bordered mt-3">
                    <tr>
                      <th>大会名</th>
                      <td>{{ $data->name }}</td>
                    </tr>
                    <tr>
                      <th>申請日時</th>
                      <td>
                        {{ isset($data->from_recruit_date) ? $data->from_recruit_date->format('Y/m/d H:i') : '' }}〜
                        {{ isset($data->to_recruit_date) ? $data->to_recruit_date->format('Y/m/d H:i') : '' }}
                      </td>
                    </tr>
                    <tr>
                      <th>開催日時</th>
                      <td>
                        {{ isset($data->from_date) ? $data->from_date->format('Y/m/d H:i') : '' }}〜
                        {{ isset($data->to_date) ? $data->to_date->format('Y/m/d H:i') : '' }}
                      </td>
                    </tr>
                    <tr><th>チーム申請数</th><td>{{ count($data->team) }}</tr>
                    <tr><th>チーム承認数</th><td>{{ $data::approved_team($data->id) }}</tr>
                    <tr><th>チーム人数</th><td>{{ $data->team_member }}</tr>
                    <tr><th>概要</th><td>{!! nl2br(e($data->note)) !!}</tr>
                </table>
              </div>
          </div>
@endsection
