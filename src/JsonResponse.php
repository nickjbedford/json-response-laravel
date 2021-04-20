<?php
	namespace YetAnother\Laravel;
	
	use Illuminate\Contracts\Support\Responsable;
	use YetAnother\JsonResponse as YetAnotherJsonResponse;
	
	class JsonResponse extends YetAnotherJsonResponse implements Responsable
	{
		public function toResponse($request)
		{
			return response()->json($this->toArray());
		}
	}