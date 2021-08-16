import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { FriendComponent } from './components/friend/friend.component';

import { PostComponent } from './components/post/post.component';
import { ProfileComponent } from './components/profile/profile.component';
import { ReportComponent } from './components/report/report.component';
import { HomeComponent } from './components/home/home.component';
import { LoginComponent } from './components/login/login.component';
import { RegisterComponent } from './components/register/register.component';
import { AppComponent } from './app.component';
import { AuthGuard } from './services/auth.guard';

const routes: Routes = [
  {
    path: '',
    component: LoginComponent
  },
  {
    path: 'home',
    component: HomeComponent,
    canActivate:[AuthGuard]
  },

  {
    path: 'friends',
    component: FriendComponent,
    canActivate:[AuthGuard]
  },
  
  {
    path: 'post',
    component: PostComponent,
    canActivate:[AuthGuard]
  },
  {
    path: 'profile',
    component: ProfileComponent,
    canActivate:[AuthGuard]
  },
  {
    path: 'profile/:user_id/:firstname',
    component: ProfileComponent,
    canActivate:[AuthGuard]
  },
  {
    path: 'profile/:user_id',
    component: ProfileComponent,
    canActivate:[AuthGuard]
  },
  {
    path: 'report',
    component: ReportComponent,
    canActivate:[AuthGuard]
  },
  
  {
    path: 'register',
    component: RegisterComponent,
    
  },
  {
    path: 'logout',
    component: LoginComponent,
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule { }
