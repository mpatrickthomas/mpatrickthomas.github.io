import { enableProdMode } from '@angular/core';
import { platformBrowserDynamic } from '@angular/platform-browser-dynamic';
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { AppRoutingModule } from './app/app-routing.module';
import { AppComponent } from './app/app.component';
import { MaterialModule } from './app/material.module';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations'
import { environment } from './environments/environment';
import { MatFormFieldModule } from '@angular/material/form-field'; 
import { MatNativeDateModule } from '@angular/material/core';
import { FormsModule, ReactiveFormsModule } from '@angular/forms'; 
import { HomeComponent } from './app/home/home.component';
import { AboutComponent } from './app/about/about.component';
import { TodoComponent } from './app/todo/todo.component';
import {ComingSoonComponent} from './app/coming-soon/coming-soon.component';
import { MAT_SNACK_BAR_DEFAULT_OPTIONS } from '@angular/material/snack-bar';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome'
import { ResumeComponent } from './app/resume/resume.component';
import { GamesComponent } from './app/games/games.component';
import { DrawingsComponent } from './app/drawings/drawings.component';
import { ExperimentsComponent } from './app/experiments/experiments.component';
if (environment.production) {
  enableProdMode();
}

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent, 
    AboutComponent, 
    TodoComponent, 
    ComingSoonComponent,
    ResumeComponent,
    GamesComponent,
    DrawingsComponent,
    ExperimentsComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    MaterialModule,
    BrowserAnimationsModule,
    MatFormFieldModule,
    MatNativeDateModule,
    FormsModule, 
    ReactiveFormsModule,
    FontAwesomeModule
  ],
  providers: [
    {provide: MAT_SNACK_BAR_DEFAULT_OPTIONS, useValue: {duration: 1000}}
  ],
  bootstrap: [AppComponent],
})
export class AppModule { }

platformBrowserDynamic().bootstrapModule(AppModule)
  .catch(err => console.error(err));
