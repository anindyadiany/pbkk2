
## Youtube Link 𐔌՞. .՞𐦯

https://youtu.be/KpSmQx1EssA

## Project Description 𝜗ৎ
External Affairs Department Website is a Laravel-based web system designed to manage and showcase the activities, members, and applications of the External Affairs Department of HMTC ITS. The platform highlights the department’s vision, bureaus, and leadership while providing an intuitive interface for applicants and members.

### Overview ˙𐃷˙
This web application was built to help the recruitment process within the External Affairs Department. It balances design and functionality to serve both students and administrators through a simple and elegant user experience.

| Layer           | Use           |
| --------------- | ---------------------- |
| Framework       | Laravel 12 (PHP 8.4)   |
| Frontend        | Tailwind CSS v4        |
| Authentication  | Laravel Breeze         |
| Database        | SQLite        |
| Build Tool      | Vite                   |
| Hosting | Herd / Laravel Artisan |

### Home Page (╥﹏╥)



### Models Implementation ₍^. .^₎⟆
#### File: app/Models/Application.php

The Application model is for form submissions from people applying to join the External Affairs Department. Every record stores the applicant’s personal information and motivation text.

##### Structure: 
```
class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'generation',
        'motivation',
    ];
}
```
#### Example: 
```
Application::create([
    'name' => 'Elizabeth Geraldine',
    'email' => 'Elizabeth@example.com',
    'generation' => 'C27',
    'motivation' => 'I want to contribute to the External Affairs Department. EA so lovely.'
]);
```

#### File: app/Models/User.php

The User model represents registered accounts who can log into the system for example, admins or applicants with dashboard access. It’s Laravel’s built-in authentication model (from Breeze).

##### Structure: 
```
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
```
#### Example: 
```
User::create([
    'name' => 'Admin',
    'email' => 'admin123@example.com',
    'password' => 'yoloo'),
]);
```
#### File: app/Models/Member.php
The Member model represents department leaders or staff and people officially part of the External Affairs team displayed on the “Meet Our Leaders” section of your website.

##### Structure: 
```
class Member extends Model
{
    protected $fillable = ['name', 'position', 'generation', 'image'];
}
```
#### Example: 
```
Member::create([
    'name' => 'Parisya Putri',
    'position' => 'Kabiro Internal',
    'generation' => 'C26',
    'image' => 'images/parisya1.jpg',
]);
```

### CRUD Implementation ᢉ𐭩 ♬⋆.˚

CRUD system for managing the form submissions from people applying to join the External Affairs

- #### CREATE
##### File: apply.blade.php
##### Route: /apply → ApplicationController@store
1. Name
2. Email
3. Generation (optional)
4. Motivation

When submitted, the form data is validated and saved into the applications table.
After submission, the user is redirected to the Applicants list page with a success message.

Example action:

`Application::create($request->validated());`

- #### READ
##### Files: index.blade.php and show.blade.php 
##### Route: /applications → ApplicationController@index, /applications/{id} → ApplicationController@show, The index page shows all submitted applications in a searchable, paginated table. The show page displays the details of a single application.

Example action:

`$applications = Application::latest()->paginate(5);`

- #### UPDATE
##### Files: edit.blade.php
##### Route: /applications/{id}/edit → ApplicationController@update

User can edit an application’s data.

Example action:
`$application->update($request->validated());`

- #### DELETE
##### Action: Delete button in index.blade.php
##### Route: /applications/{id} → ApplicationController@destroy. 

The user can delete their application. After deletion, the page redirects back to the application list with a success message.

Example action:
`$application->delete();`

