import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { AboutComponent } from './about/about.component';
import { ComingSoonComponent } from './coming-soon/coming-soon.component';
import { ResumeComponent } from './resume/resume.component';
import { GamesComponent } from './games/games.component';
import { DrawingsComponent } from './drawings/drawings.component';
import { ExperimentsComponent } from './experiments/experiments.component';


const routes: Routes = [
  { path:'', component: HomeComponent },
  { path:'about', component: AboutComponent },
  { path:'comingsoon', component: ComingSoonComponent },
  { path:'resume', component:ResumeComponent },
  { path: 'games', component:GamesComponent },
  { path: 'drawings', component:DrawingsComponent },
  { path: 'experiments', component:ExperimentsComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
