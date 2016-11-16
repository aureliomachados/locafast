<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Papel</th>
            <th colspan="2">Ações</th>
        </tr>

        @foreach($users as $user)
            @unless($user->id == Auth::user()->id )
            <tr>
                <td><a href="{{ route('users.show', ['id' => $user->id]) }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>
                @foreach($user->roles as $role)
                    {{ $role->name . ' ' }}
                @endforeach
                </td>
                <td>
                    <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-warning">Editar</a>
                </td>
                <td>
                    <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE"/>

                        <button type="submit" class="btn btn-danger" onclick=" return confirm('Você tem certeza?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endunless
        @endforeach
    </table>
</div>