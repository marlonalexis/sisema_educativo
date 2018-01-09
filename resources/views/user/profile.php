$view = view('home')->with('nombre', 'Javi');

$view = view('user.profile')
            ->with('user', $user)
            ->with('editable', false)