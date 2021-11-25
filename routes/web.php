<?php

use App\Http\Controllers\Documentation\References;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('index');
});

$menu = theme()->getMenu();
array_walk($menu, function ($val) {
    if (isset($val['path'])) {
        $route = Route::get($val['path'], [PagesController::class, 'index']);

        // Exclude documentation from auth middleware
        if (!Str::contains($val['path'], 'documentation')) {
            $route->middleware('auth');
        }
    }
});

Route::post('/workspacescreate', 'WorkspaceController@create');
Route::post('/workspacesremove', 'WorkspaceController@delete');
Route::post('/workspacesinviteremove', 'WorkspaceController@deleteInvite');
Route::post('/workspacesupdate', 'WorkspaceController@update');


//ECONOMIA DELETE
Route::post('/finantialdelete', 'FinantialController@deleteFinantial');


//MEDIA DELETE
Route::post('/media_delete', 'ContactController@removeMedia')->name('media.delete');
Route::post('/media_deleteResource', 'ResourcesController@removeMedia')->name('mediaResource.delete');
Route::post('/media_deleteProject', 'ProjectController@removeMedia')->name('mediaProject.delete');
Route::post('/media_deleteGroup', 'GroupController@removeMedia')->name('mediaProject.delete');


Route::post('/address_delete', 'ContactController@removeAddress')->name('address.delete');

Route::post('/mail_delete', 'ContactController@removeEmail')->name('mail.delete');

Route::get('/activate/{id}', 'UserProfileController@activate' );


Route::get('/google-calendar/connect', 'GoogleCalendarController@connect');
Route::post('/google-calendar/connect', 'GoogleCalendarController@store');
Route::get('get-resource', 'GoogleCalendarController@getResources');



Route::post('/taskcreate', 'TaskController@create')->name('task_create');;
Route::post('/taskremove', 'TaskController@delete');
Route::post('/taksupdate', 'TaskController@update');

Route::post('/inviteToProject', 'ProjectController@invite'); 


Route::post('/mytaksupdate', 'TaskController@updateMyTask');
Route::post('/mytakedit', 'TaskController@editMyTas');

Route::post('/taksStatus', 'TaskController@taksStatus');
Route::post('/document_delete', 'DocumentsController@remove')->name('document.delete');
Route::get('document_download/{file}', 'DocumentsController@download')->name('document.download');

Route::post('/removeMember', 'TeamController@removeMember');

Route::group(['middleware' => 'auth'], function(){

    //companies
    Route::resource('/companies','CompanyController');
    Route::get('/new-company', 'CompanyController@new' );
    Route::get('/edit-company/{id}', 'CompanyController@edit')->where(['id' => '\d+'])->name('company_edit');
    Route::post('new_company', 'CompanyController@store')->name('new.company');
    Route::post('update_company', 'CompanyController@update')->name('update.company');
    Route::post('/company_delete', 'CompanyController@remove')->name('company.delete');
    Route::post('/mediaCompany_save', 'CompanyController@storeMedia')->name('mediaCompany.save');
    Route::post('/document_saveCompany', 'DocumentsController@storeInCompany')->name('document.saveInCompany');
    Route::post('/address_saveCompany', 'CompanyController@addAddress')->name('address.saveInCompany');
    Route::post('/note_saveCompany', 'CompanyController@storeNote')->name('note.saveInCompany');
    Route::post('/settings_saveCompany', 'CompanyController@storeSettings')->name('settings.saveInCompany');
    Route::post('/mail_saveCompany', 'CompanyController@storeEmail')->name('mail.saveCompany');

    //groups
    Route::get('/groups', 'GenericController@getGroup'); 
    Route::get('/new-group', 'GroupController@new' )->name('group.new');
    Route::get('/edit-group/{id}', 'GroupController@edit')->where(['id' => '\d+'])->name('group_edit');
    Route::post('new_group', 'GroupController@store')->name('new.group');
    Route::post('update_group', 'GroupController@update')->name('update.group');
    Route::post('/mediaGroup_save', 'GroupController@storeMedia')->name('mediaGroup.save');
    Route::post('/noteGroup_save', 'GroupController@storeNote')->name('noteGroup.save');
    Route::post('/settingsGroup_save', 'GroupController@storeSettings')->name('settingsGroup.save');


     //events
     Route::resource('/events', 'EventController'); 
     Route::get('/new-event', 'EventController@new' )->name('event.new');
     Route::get('/edit-event/{id}', 'EventController@edit')->where(['id' => '\d+'])->name('event_edit');
     Route::post('new_event', 'EventController@store')->name('new.event');

     Route::post('/operator_save', 'EventController@storeOperator')->name('operator.save');
     Route::post('/mediaEvent_save', 'EventController@storeMedia')->name('mediaEvent.save');
     Route::post('/document_saveEvent', 'EventController@storeInEvent')->name('document.saveInEvent');
     Route::post('/noteEvent_save', 'EventController@storeNote')->name('noteEvent.save');
  

      //documents
      Route::resource('/documents', 'DocumentsController');


     //Route::post('new_group', 'GroupController@store')->name('new.group');
     //Route::post('update_group', 'GroupController@update')->name('update.group');



      //projects
      Route::resource('/projects', 'ProjectController'); 
      Route::get('/edit-project/{id}', 'ProjectController@edit')->where(['id' => '\d+'])->name('project_edit');
      Route::post('new_project', 'ProjectController@store')->name('new.project');
      Route::post('/document_saveProject', 'DocumentsController@storeInProject')->name('document.saveInProject');
      Route::post('/noteProject_save', 'ProjectController@storeNote')->name('noteProject.save');
      Route::post('/mediaProject_save', 'ProjectController@storeMedia')->name('mediaProject.save');
     
      
      //Route::post('new_group', 'GroupController@store')->name('new.group');
      //Route::post('update_group', 'GroupController@update')->name('update.group');



      //tasks
      Route::resource('/tasks', 'TaskController'); 
      Route::get('/allTasks', 'TaskController@getTasks'); 
      Route::get('/edit-task/{id}', 'TaskController@edit')->where(['id' => '\d+'])->name('task_edit');
      Route::post('update_task', 'TaskController@update')->name('update.task');
  
      
      //Route::post('new_group', 'GroupController@store')->name('new.group');
      //Route::post('update_group', 'GroupController@update')->name('update.group');



    Route::resource('/contacts','ContactController');
    Route::get('/new-contact', 'ContactController@new' );
    Route::get('/edit-contact/{id}', 'ContactController@edit')->where(['id' => '\d+'])->name('contact_edit');

    Route::post('/business_save', 'ContactController@storeBusiness')->name('business.save');
    Route::post('/media_save', 'ContactController@storeMedia')->name('media.save');
    
    Route::post('/mail_save', 'ContactController@storeEmail')->name('mail.save');
    
    Route::post('/note_save', 'ContactController@storeNote')->name('note.save');
    Route::post('/settings_save', 'ContactController@storeSettings')->name('settings.save');

    Route::post('/address_save', 'ContactController@addAddress')->name('address.save');
    Route::post('/address_update', 'ContactController@updateAddress')->name('address.update');




    //PARTECIPANTI
    Route::get('/partecipants', 'EventController@getPartecipants'); 
    Route::post('/edit_partecipant', 'EventController@getPartecipante'); 
    Route::post('new_partecipant', 'EventController@storePartecipant')->name('new.partecipant');
    Route::post('update_partecipant', 'EventController@updatePartecipant')->name('update.partecipant');


    //RESOURCES 
    Route::get('/resources', 'ResourcesController@index'); 
    Route::get('/new-resource', 'ResourcesController@new' )->name('resource.new');
    Route::get('/edit-resource/{id}', 'ResourcesController@edit')->where(['id' => '\d+'])->name('resource_edit');
    Route::post('new_resource', 'ResourcesController@store')->name('new.resource');
    Route::post('update_resourcep', 'ResourcesController@store')->name('update.resource');
    Route::post('/mediaResource_save', 'ResourcesController@storeMedia')->name('mediaResource.save');



    //FINANTIAL
    Route::post('/finantial_save', 'FinantialController@store')->name('finantial.save');
    



    Route::resource('/projects','ProjectController');
    Route::get('/new-project', function (){return view('project.create');} );


    Route::resource('/workspaces','WorkspaceController');
    Route::get('/new-workspace', function (){return view('workspace.create');} );


    Route::resource('/myprofile','UserProfileController');
    Route::post('myprofile_save', 'UserProfileController@store')->name('myprofile.save');
    Route::post('myprofile_pwd', 'UserProfileController@changepwd')->name('myprofile.changepwd');
    Route::post('/myprofile_blocked', 'UserProfileController@blockMyAccount');


    Route::post('/sendinvites', 'WorkspaceController@sendInvites');
    Route::get('/acceptinvites/{id}', 'WorkspaceController@acceptinvitesView' );
    Route::post('acceptinvite/{id}', 'WorkspaceController@acceptinvite')->name('accept.invite');


    //Route::resource('/teams','TeamsController');
    

    Route::get('workspace_edit/{id}', 'WorkspaceController@edit')->where(['id' => '\d+'])->name('workspace_edit');
    Route::get('/profile', 'UserProfileController@index')->name('myprofile');



    Route::post('new_contact', 'ContactController@store')->name('new.contact');
    Route::post('update_contact', 'ContactController@update')->name('update.contact');



    Route::resource('/documents','DocumentsController');
    Route::post('/document_saveTask', 'DocumentsController@storeInTask')->name('document.saveTask');
    Route::post('/document_saveGroup', 'DocumentsController@storeInGroup')->name('document.saveInGroup');
    Route::post('/document_save', 'DocumentsController@store')->name('document.save');
    Route::post('/document_saveResource', 'DocumentsController@storeInResource')->name('document.saveInResource');
    Route::post('/document_saveTask', 'DocumentsController@storeInTask')->name('document.saveInTask');

    Route::resource('/teams','TeamController');
    Route::post('/team_save', 'TeamController@store')->name('team.save');
    Route::post('/member_save', 'TeamController@addMember')->name('member.save');
    Route::get('/edit-team/{id}', 'TeamController@edit')->where(['id' => '\d+'])->name('team_edit');
    


});

// Documentations pages
Route::prefix('documentation')->group(function () {
    Route::get('getting-started/references', [References::class, 'index']);
    Route::get('getting-started/changelog', [PagesController::class, 'index']);
});

require __DIR__.'/auth.php';
