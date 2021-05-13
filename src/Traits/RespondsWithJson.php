<?php
	/** @noinspection PhpUnused */
	
	namespace YetAnother\Laravel\Traits;
	
	use Throwable;
	use YetAnother\Laravel\JsonResponse;
	
	trait RespondsWithJson
	{
		/**
		 * Returns a JSON response indicating success.
		 * @param mixed|null $data An optional data payload for the client.
		 * @return JsonResponse
		 */
		public function jsonSuccess($data = null): JsonResponse
		{
			return JsonResponse::success($data);
		}
		
		/**
		 * Returns a JSON response indicating failure with an optional error code and data payload.
		 * @param string $errorMessage The error message to display to the user.
		 * @param string|null $errorCode An optional error code for the client to use in handling the error.
		 * @param array $errorData An optional data payload with further information
		 * @return JsonResponse
		 */
		public function jsonFailure(string $errorMessage, ?string $errorCode = null, array $errorData = []): JsonResponse
		{
			return JsonResponse::failure($errorMessage, $errorCode, $errorData);
		}
		
		/**
		 * Returns a JSON response indication failure from an exception, with optional debugging data
		 * about the exception included in the error data payload.
		 * @param Throwable $exception The exception that was thrown.
		 * @param bool|null $includeDebugData Whether or not to include the debugging information about the
		 * exception in the error payload. This will default to the JsonResponse::$debugMode value.
		 * @return JsonResponse
		 */
		public function jsonException(Throwable $exception, ?bool $includeDebugData = null): JsonResponse
		{
			return JsonResponse::exception($exception, $includeDebugData);
		}
		
		/**
		 * Returns a JSON response indicating success for a paged set of records.
		 * @param array $records The records in the current page.
		 * @param int $page The page index.
		 * @param int|null $pageLength The length of each page in the query,
		 * otherwise the number of records in the current page.
		 * @param int|null $totalRecords The total number of records in the query,
		 * otherwise the number of records in the current page.
		 * @param string|null $recordType Optionally specifies the type of records in the set.
		 * @return JsonResponse
		 */
		public function jsonRecordSet(
			array $records,
			int $page = 0,
			?int $pageLength = null,
			?int $totalRecords = null,
			?string $recordType = null): JsonResponse
		{
			return JsonResponse::recordSet($records, $page, $pageLength, $totalRecords, $recordType);
		}
	}