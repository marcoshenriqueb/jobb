<div>
  <h1>The job {{$job->title}} was posted!</h1>
  <p>
    Access its applicants over <a href="{{route('job.applicants', ['hash_url'=>$job->hash_url])}}">here</a>.
  </p>
</div>
