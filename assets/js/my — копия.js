let comments = [];

document.getElementById('comment-add').onclick = function () {
  event.preventDefault();
  let commentName = document.getElementById('validationDefault01');
  let commentEmail = document.getElementById('validationDefault02');
  let commentBody = document.getElementById('validationDefault03');

  let comment = {
    name : commentName.value,
    email : commentEmail.value,
    body : commentBody.value,
  }
  commentName.value = '';
  commentEmail.value = '';
  commentBody.value = '';
  comments.push(comment);
  saveComments();
  showComments();
}

function saveComments() {
  localStorage.setItem('comments', JSON.stringify(comments));
}

function showComments() {
  let commentField = document.getElementById('comment-field');
  let out = '';
  comments.forEach(function(item) {
    out += `<div class="container">
              <div class="card border-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">${item.name}</div>
                    <div class="card-body">
                        <h5 class="card-title">${item.email}</h5>
                        <p class="card-text">${item.body}</p>
                    </div>
              </div>
            </div>`;
  });
  commentField.innerHTML = out;
}