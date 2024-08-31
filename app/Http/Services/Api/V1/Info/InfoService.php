<?php

namespace App\Http\Services\Api\V1\Info;

use App\Http\Resources\V1\Infos\InfosResource;
use App\Http\Traits\GeneralTrait;
use App\Repository\InfoRepositoryInterface;
use App\Http\Traits\Responser;

class InfoService
{
    use Responser;
    use GeneralTrait;
    public function __construct(private InfoRepositoryInterface $repository)
    {

    }

    public function __invoke()
    {
        // $data['facebook'] = $this->repository->getValue(['facebook']);
        // $data['twitter'] = $this->repository->getValue(['twitter']);
        // $data['whatsapp'] = $this->repository->getValue(['whatsapp']);
        // return $this->returnData('data',$data);

        $data = $this->repository->getAll();
        $result = [];
        foreach ($data as $item)
        {
            if($item['type'] =='image')
            {
                $result[$item['key']] = url($item['value']);
            }
            else
            {
                $result[$item['key']] = $item['value'];
            }
        }
        return $this->responseSuccess(data: $result);
    }
}
