<?php
/**
 * @use define some common response
 *
 * @SWG\Response(
 *   response="default",
 *   description="The default response data.",
 *   @SWG\Schema(ref="#/definitions/DefaultResponse")
 * )
 *
 * @SWG\Response(
 *   response="error",
 *   description="The error response data. (`code is != 0`)",
 *   @SWG\Schema(ref="#/definitions/Error")
 * )
 *
 * @SWG\Response(
 *   response="todo",
 *   description="This API call has no documentated response (yet)",
 * )
 */
