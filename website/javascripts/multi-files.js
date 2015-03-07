
 /*
  *  Convert a single file-input element into a 'multiple' input list.
  *
  *  Copyright (c) 2006 Dino Termini (termini@email.it)
  *
  *  Permission is granted to copy, distribute and/or modify this document
  *  under the terms of the GNU Free Documentation License, Version 1.2 or
  *  any later version published by the Free Software Foundation; with no
  *  Invariant Sections, no Front-Cover Texts, and no Back-Cover Texts. A
  *  copy of the license is included in the section entitled "GNU Free
  *  Documentation License".
  *
  */

 function MultiSelector (list_target, max)
  {
   // where to write the list.
   this.list_target = list_target;

   // how many elements?
   this.count = 0;

   // how many elements?
   this.id = 0;

   // is there a maximum?
   if(max)
   {
    this.max = max;
   }
   else
   {
    this.max = -1;
   };
	
   /**
    * add a new file input element.
    */
   this.addElement = function (element)
    {
     // make sure it's a file input element.
     if (element.tagName == 'INPUT' && element.type == 'file')
     {
      // element name -- what number am I?
      element.name = 'file_upload_' + this.id++;

      // add reference to this object.
      element.multi_selector = this;

      // what to do when a file is selected.
      element.onchange = function()
       {
        // new file input.
        var new_element = document.createElement ('input');
        new_element.type = 'file';

        // add new element.
        this.parentNode.insertBefore (new_element, this);

        // apply 'update' to element.
        this.multi_selector.addElement (new_element);

        // update list.
        this.multi_selector.addListRow (this);

        // hide this: we can't use display:none because Safari doesn't like it.
        this.style.position = 'absolute';
        this.style.left     = '-1000px';
       };

      // if we've reached maximum number, disable input element.
      if (this.max != -1 && this.count >= this.max)
      {
       element.disabled = true;
      };

      // file element counter.
      this.count++;

      // most recent element.
      this.current_element = element;
     }
     else
     {
      // this can only be applied to file input elements!
      alert ('Σφάλμα: δεν υπάρχει στοιχείο αρχείου εισόδου.');
     };
    };

   /**
    * add a new row to the list of files.
    */
   this.addListRow = function (element)
    {
     // row div.
     var new_row = document.createElement ('div');

     // new lines.
     var new_row_br_a = document.createElement ('br');
     var new_row_br_b = document.createElement ('br');

     // delete button.
     var new_row_button   = document.createElement ('input');
     new_row_button.type  = 'button';
     new_row_button.value = 'Αφαίρεση';

     // references.
     new_row.element = element;

     // delete function.
     new_row_button.onclick = function ()
      {
       // remove element from form.
       this.parentNode.element.parentNode.removeChild (this.parentNode.element);

       // remove this row from the list.
       this.parentNode.parentNode.removeChild (this.parentNode);

       // decrement counter.
       this.parentNode.element.multi_selector.count--;

       // re-enable input element (if it's disabled).
       this.parentNode.element.multi_selector.current_element.disabled = false;

       // appease Safari
       //    without it Safari wants to reload the browser window
       //    which nixes your already queued uploads.
       return false;
      };

     // set row value.
     new_row.innerHTML = element.value;

     // add button.
     new_row.appendChild (new_row_button);

     new_row.appendChild (new_row_br_a);
     new_row.appendChild (new_row_br_b);

     // add it to the list.
     this.list_target.appendChild (new_row);
    };
  };