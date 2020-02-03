<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Issue extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'issues';

    const PATH = "Files/Issue/Doc/";

    const RISK_DANGER = [
        1 => 'Rất nhẹ',
        2 => 'Nhẹ',
        3 => 'Nghiêm trọng',
        4 => 'Rất nghiêm trọng',
    ];

    const RISK_FEATURE = [
        1 => 'Rất không có khả năng',
        2 => 'Không có khả năng',
        3 => 'Có khả năng',
        4 => 'Rất có khả năng',
    ];

    const RISK_STATUS = [
        1 => 'Mở',
        2 => 'Chờ phê duyệt',
        3 => 'Được tạo từ risk',
        4 => 'Đóng',
    ];

    const STATUS = [
        1 => 'Mở',
        2 => 'Đang điều tra',
        3 => 'Đang giải quyết',
        4 => 'Đang chờ phê duyệt',
        5 => 'Đã giải quyết',
        6 => 'Quá hạn',
    ];

    const COLOR_CLASS = [
        1 => 'bg-board',
        2 => 'bg-white',
        3 => 'bg-warning',
        4 => 'bg-danger',
        5 => '',
        6 => 'bg-success',
    ];

    const TYPE = [
        1 => 'Kĩ thuật',
        2 => 'Quy trình kinh doanh',
        3 => 'Quản lý thay đổi',
        4 => 'Nguồn lực',
        5 => 'Bên thứ ba',
    ];

    const RISK_TYPE = [
        1 => 'Kĩ thuật',
        2 => 'Quy trình kinh doanh',
        3 => 'Thay đổi quản lý',
        4 => 'Nguồn lực',
        5 => 'Bên thứ ba',
    ];

    const PRIORITY = [
        1 => 'Rất thấp',
        2 => 'Thấp',
        3 => 'Trung Bình',
        4 => 'Cao'
    ];

    const RISK_PRIORITY = [
        1 => 'Rất thấp',
        2 => 'Thấp',
        3 => 'Trung Bình',
        4 => 'Cao'
    ];

    const PERCENT = [
        1 => '0%',
        2 => '20%',
        3 => '40%',
        4 => '60%',
        5 => '80%',
        6 => '100%',
    ];

    const DEFEND_SCHEDULE_STATUS = [
        0 => 'Kế hoạch không có phản hồi',
        1 => 'Kế hoạch IDLE',
        2 => 'Kế hoạch đang thực hiện',
        3 => 'Kế hoạch bị hỏng',
    ];

    const DEFEND_PRIORITY = [
        0 => 'Rất cao',
        1 => 'Cao',
        2 => 'Trung bình',
        3 => 'Thấp',
    ];

    protected $fillable = [
        'priority',
        'title',
        'columns',
        'description',
        'template_id',
        'user_id',
        'children_issue_ids',
        'parent_issue_id',
        'required_issue_id',
        'relative_issue_ids',
        'subordinate_issue_ids',
        'similar_issue_ids',
        'note',
        'task_id',
        'created_by',
        'status',
        'type',
        'start_date',
        'end_date',
        'time',
        'completed',
        'solution',
        'documentation',
        'is_report',
        'approve_user_ids',
        'view_user_ids',
    ];

    public static function getLabelRiskFeature($id)
    {
        return self::RISK_FEATURE[$id];
    }

    public static function getLabelRiskDanger($id)
    {
        return self::RISK_DANGER[$id];
    }

    public function similarIssue() {
        if($this->similar_issue_ids) {
            $issue = [];
            foreach ($this->similar_issue_ids as $id) {
                $is = Issue::find($id);
                if($is) {
                    $issue[] = $is;
                }
            }
            return $issue;
        } else {
            return null;
        }
    }

    public function relativeIssue() {
        if($this->relative_issue_ids) {
            $issue = [];
            foreach ($this->relative_issue_ids as $id) {
                $is = Issue::find($id);
                if($is) {
                    $issue[] = $is;
                }
            }
            return $issue;
        } else {
            return null;
        }
    }

    public function subordinateIssue() {
        if($this->subordinate_issue_ids) {
            $issue = [];
            foreach ($this->subordinate_issue_ids as $id) {
                $is = Issue::find($id);
                if($is) {
                    $issue[] = $is;
                }
            }
            return $issue;
        } else {
            return null;
        }
    }

    public function requireIssue() {
        if($this->required_issue_id) {
           $issue =  Issue::find($this->required_issue_id);
           return $issue;
        } else {
            return null;
        }
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            if (auth()->user()) {
                $model->created_by = auth()->user()->id;
            }
        });
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function getCreatedByNameAttribute()
    {
        if($this->created_by) {
            return User::find($this->created_by)->name;
        }
        return '';
    }

    public function getStatusNameAttribute()
    {
        if ($this->status) {
            return self::STATUS[$this->status];
        }
        return '';
    }

    public function getTypeLabel()
    {
        if ($this->type) {
            return self::TYPE[$this->status];
        }
        return '';
    }

    public function getTypeLabelAttribute()
    {
        if ($this->type) {
            return self::TYPE[$this->status];
        }
        return '';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPriorityNameAttribute()
    {
        if ($this->priority) {
            return self::PRIORITY[$this->priority];
        }
        return '';
    }

    public function getLabelPercent()
    {
        if ($this->completed) {
            return self::PERCENT[$this->completed];
        }
        return '';
    }

    public function getColorClass()
    {
        return $this::COLOR_CLASS[$this->status];
    }

    public function getColorNameAttribute()
    {
        return $this::COLOR_CLASS[$this->status] ?? '';
    }

    public function getChildIssue()
    {
        $issues = null;
        if (!empty($this->children_issue_ids)) {
            $title = '';
            foreach($this->children_issue_ids as $issueId) {
                $issue = Issue::find($issueId);
                if ($issue) {
                    $title .= "$issue->title ";
                }
            }
            return $title;
        }
        return $issues;
    }

    public function getRelativeIssueLabel()
    {
        $issues = null;
        if (!empty($this->relative_issue_ids)) {
            $title = '';
            foreach($this->relative_issue_ids as $issueId) {
                $issue = Issue::find($issueId);
                if ($issue) {
                    $title .= "$issue->title ";
                }
            }
            return $title;
        }
        return $issues;
    }

    public function getRelativeIssue()
    {
        $issues = null;
        if (!empty($this->relative_issue_ids)) {
            $issues = Issue::find($this->relative_issue_ids);
        }
        return $issues;
    }

    public function getRequiredIssue()
    {
        $issue = null;
        if (!empty($this->required_issue_id)) {
            $issue = Issue::find($this->required_issue_id);
        }
        return $issue;
    }

    public function getSubordinateIssue()
    {
        $issues = null;
        if (!empty($this->subordinate_issue_ids)) {
            $issues = Issue::find($this->subordinate_issue_ids);
        }
        return $issues;
    }

    public function getSimilarIssue()
    {
        $issues = null;
        if (!empty($this->similar_issue_ids)) {
            $issues = Issue::find($this->similar_issue_ids);
        }
        return $issues;
    }

    public function removeParentId()
    {
        $this->parent_issue_id = null;
        $this->save();
    }

    public function updateChildIssues(array $updateChildIds)
    {
        $currentChildIssueIds = $this->children_issue_ids;
        $sameChildIds = array_intersect($currentChildIssueIds, $updateChildIds);
        $childIssueBeRemoveIds = array_diff($sameChildIds, $currentChildIssueIds);
        if (!empty($childIssueBeRemoveIds)) {
            foreach ($childIssueBeRemoveIds as $childIssueBeRemoveId) {
                $childIssueBeRemove = Issue::find($childIssueBeRemoveId);
                $childIssueBeRemove->removeParentId();
            }
        }
        $childIssueBeAddIds = array_diff($sameChildIds, $updateChildIds);
        if (!empty($childIssueBeAddIds)) {
            foreach ($childIssueBeAddIds as $childIssueBeAddId) {
                $childIssueBeAdd = Issue::find($childIssueBeAddId);
                $childIssueBeAdd->save([
                    'parent_issue_id' => $this->id,
                ]);
            }
        }
    }

    public function getNameCreated()
    {
        if ($this->created_by) {
            $user = User::find($this->created_by);
            return $user->name;
        }
    }

    public function removeChildId($childId)
    {
        $key = array_search($childId, $this->children_issue_ids);
        if ($key == false) {
            $a = $this->children_issue_ids;
            unset($a[$key]);
            $this->children_issue_ids = $a;
            $this->save();
        }
    }

    public function addChildId($issueId)
    {
        $this->children_issue_ids += [$issueId];
        $this->save();
    }

    public function updateParentIssue($updateParentId)
    {
        if (($this->parent_issue_id != $updateParentId) && !empty($this->parent_issue_id)) {
            $parentRemoveChild = Issue::find($this->parent_issue_id);
            if ($parentRemoveChild) {
                $parentRemoveChild->removeChildId($this->id);
                $parentAddChild = Issue::find($updateParentId);
                $parentAddChild->addChildId($this->id);
            }
        }
    }

    public function removeRelativeId($issueId)
    {
        $key = array_search($issueId, $this->relative_issue_ids);
        if ($key == false) {
            $a = $this->relative_issue_ids;
            unset($a[$key]);
            $this->relative_issue_ids = $a;
            $this->save();
        }
    }

    public function addRelativeId($issueId)
    {
        $this->relative_issue_ids += [$issueId];
        $this->save();
    }

    public function updateRelativeIssues(array $updateRelativeIds)
    {
        $currentRelativeIssueIds = (array)$this->relative_issue_ids;
        $sameRelativeIds = array_intersect($currentRelativeIssueIds, $updateRelativeIds);
        $relativeIssueBeRemoveIds = array_diff($sameRelativeIds, $currentRelativeIssueIds);
        if (!empty($relativeIssueBeRemoveIds)) {
            foreach ($relativeIssueBeRemoveIds as $relativeIssueBeRemoveId) {
                $relativeIssueBeRemove = Issue::find($relativeIssueBeRemoveId);
                $relativeIssueBeRemove->removeRelativeId($this->id);
            }
        }
        $relativeIssueBeAddIds = array_diff($sameRelativeIds, $updateRelativeIds);
        if (!empty($relativeIssueBeAddIds)) {
            foreach ($relativeIssueBeAddIds as $relativeIssueBeAddId) {
                $relativeIssueBeAdd = Issue::find($relativeIssueBeAddId);
                $relativeIssueBeAdd->addRelativeId($this->id);
            }
        }
    }

    public function removeSimilarId($issueId)
    {
        $key = array_search($issueId, $this->similar_issue_ids);
        if ($key == false) {
            $a = $this->similar_issue_ids;
            unset($a[$key]);
            $this->similar_issue_ids = $a;
            $this->save();
        }
    }

    public function addSimilarId($issueId)
    {
        $this->similar_issue_ids += [$issueId];
        $this->save();
    }

    public function updateSimilarIssues(array $updateSimilarIds)
    {
        $currentSimilarIssueIds = (array)$this->similar_issue_ids;
        $sameSimilarIds = array_intersect($currentSimilarIssueIds, $updateSimilarIds);
        $similarIssueBeRemoveIds = array_diff($sameSimilarIds, $currentSimilarIssueIds);
        if (!empty($similarIssueBeRemoveIds)) {
            foreach ($similarIssueBeRemoveIds as $similarIssueBeRemoveId) {
                $similarIssueBeRemove = Issue::find($similarIssueBeRemoveId);
                $similarIssueBeRemove->removeSimilarId($this->id);
            }
        }
        $similarIssueBeAddIds = array_diff($sameSimilarIds, $updateSimilarIds);
        if (!empty($similarIssueBeAddIds)) {
            foreach ($similarIssueBeAddIds as $similarIssueBeAddId) {
                $similarIssueBeAdd = Issue::find($similarIssueBeAddId);
                $similarIssueBeAdd->addSimilarId($this->id);
            }
        }
    }

    public function removeBlockId($issueId)
    {
        $key = array_search($issueId, $this->block_issue_ids);
        if ($key == false) {
            $a = $this->block_issue_ids;
            unset($a[$key]);
            $this->block_issue_ids = $a;
            $this->save();
        }
    }

    public function removeSubordinateId($issueId)
    {
        $key = array_search($issueId, $this->subordinate_issue_ids);
        if ($key == false) {
            $a = $this->subordinate_issue_ids;
            unset($a[$key]);
            $this->subordinate_issue_ids = $a;
            $this->save();
        }
    }

    public function addBlockId($issueId)
    {
        $this->block_issue_ids += [$issueId];
        $this->save();
    }

    public function updateBlockIssues(array $updateBlockIds)
    {
        $currentBlockIssueIds = (array)$this->block_issue_ids;
        $sameBlockIds = array_intersect($currentBlockIssueIds, $updateBlockIds);
        $blockIssueBeRemoveIds = array_diff($sameBlockIds, $currentBlockIssueIds);
        if (!empty($blockIssueBeRemoveIds)) {
            foreach ($blockIssueBeRemoveIds as $blockIssueBeRemoveId) {
                $blockIssueBeRemove = Issue::find($blockIssueBeRemoveId);
                $blockIssueBeRemove->removeBlockId($this->id);
            }
        }
        $blockIssueBeAddIds = array_diff($sameBlockIds, $updateBlockIds);
        if (!empty($blockIssueBeAddIds)) {
            foreach ($blockIssueBeAddIds as $blockIssueBeAddId) {
                $blockIssueBeAdd = Issue::find($blockIssueBeAddId);
                $blockIssueBeAdd->addBlockId($this->id);
            }
        }
    }

    public function removeRequiredId()
    {
        $this->required_issue_id = null;
        $this->save();
    }

    public function updateSubordinateIssues(array $updateSubordinateIds)
    {
        $currentSubordinateIssueIds = (array)$this->subordinate_issue_ids;
        $sameSubordinateIds = array_intersect($currentSubordinateIssueIds, $updateSubordinateIds);
        $subordinateIssueBeRemoveIds = array_diff($sameSubordinateIds, $currentSubordinateIssueIds);
        if (!empty($subordinateIssueBeRemoveIds)) {
            foreach ($subordinateIssueBeRemoveIds as $subordinateIssueBeRemoveId) {
                $subordinateIssueBeRemove = Issue::find($subordinateIssueBeRemoveId);
                $subordinateIssueBeRemove->removeRequiredId();
            }
        }
        $subordinateIssueBeAddIds = array_diff($sameSubordinateIds, $updateSubordinateIds);
        if (!empty($subordinateIssueBeAddIds)) {
            foreach ($subordinateIssueBeAddIds as $subordinateIssueBeAddId) {
                $subordinateIssueBeAdd = Issue::find($subordinateIssueBeAddId);
                $subordinateIssueBeAdd->save([
                    'required_issue_id' => $this->id,
                ]);
            }
        }
    }

    public static function getAllExpiredIssues()
    {
        $today = today();
        $issues = Issue::where('is_report', null)
            ->where('end_date', '<', $today->format('Y-m-d'))
            ->where('end_date', '<>', null)
            ->get();
        return $issues;
    }

    public static function reportIssue()
    {
        $issues = self::getAllExpiredIssues();
        if (!empty($issues)) {
            foreach($issues as $issue) {
                $data = [
                    'template_id' => $issue->template_id,
                    'title' => 'Issue report',
                    'description' => "Issue được tạo từ $issue->title quá hạn!",
                    'parent_issue_id' => $issue->id,
                    'task_id' => $issue->task_id,
                    'status' => 3,
                    'type' => 2,
                    'completed' => 1,
                    'priority' => 2,
                ];
                $reportIssue = Issue::create($data);
                $issue->children_issue_ids = (array)$issue->children_issue_ids + [$reportIssue->id];
                $issue->is_report = 1;
                $issue->save();
            }
        }
    }
}
