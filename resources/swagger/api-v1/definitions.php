<?php
/**
 * @use There are some common Definition Schemas for project.
 *
 * @SWG\Definition(
 *     definition="Error",
 *     description="The default Error data model",
 *     required={"status", "message"},
 *     @SWG\Property(
 *         property="status",
 *         type="integer",
 *         format="int32",
 *         description="错误码 非零(`!= 0`)"
 *     ),
 *     @SWG\Property(
 *         property="message",
 *         type="string"
 *     )
 * )
 *
 * @SWG\Definition(
 *     definition="Success",
 *     description="The default Success response data model",
 *     required={"status", "message"},
 *     @SWG\Property(
 *         property="status",
 *         type="integer",
 *         format="int32",
 *         description="错误码 等于零`=0`"
 *     ),
 *     @SWG\Property(
 *         property="message",
 *         type="string",
 *         default="successful"
 *     ),
 *     @SWG\Property(
 *         property="data",
 *         type="object"
 *     )
 * )
 *
 */
