<x-layout>
<section class="container-fluid our-gradient-reverse pt-5 py-5">
  <div class="container pt-5">
  <div class="row pt-5">
    <div class="col-12">
        <form method="POST" action="{{route("submit")}}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome e Cognome</label>
                <input type="text" class="form-control" name="name">
              </div>
          <div class="mb-3">
              <label for="number" class="form-label">La tua età</label>
              <input type="number" class="form-control" name="eta">


              <label for="select">Disponibilità</label>
              <select name="disponibilita" id="select" class="form-select">
              <option selected></option>
              <option  value="Part-time">Part-time</option>
              <option  value="Full-time">Full-time</option>
            </select>
          </div> 
                
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">E-Mail</label>
              <input type="email" class="form-control" name="email">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="form-floating">
                <textarea class="form-control" name="message" placeholder="scrivi qui il tuo commento" id="floatingTextarea"></textarea>
                <label for="floatingTextarea">Scrivi qui il tuo messaggio</label>
              </div>

            <div class="d-flex pt-5 justify-content-center">
            <button type="submit" class="btn button">Submit</button>
          </div>
          </form>
    </div>
  </div>
  
  </div>
</section>



</x-layout>