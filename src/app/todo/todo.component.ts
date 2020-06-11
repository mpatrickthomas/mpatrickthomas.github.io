import { Component } from '@angular/core';

@Component({
  selector: 'todo',
  template: `<p 
              class='mat-typography todo'
              style="
                color: green;
                border: dotted;
                padding: 5px;"
              >
              TODO: <ng-content></ng-content>
              </p>`,
})
export class TodoComponent {}
